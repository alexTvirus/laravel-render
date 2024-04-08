<?php


namespace App\Services;


use App\Models\ContentImage as ContentImageModel;
use Google_Service_Drive_Permission;
use Illuminate\Support\Facades\Storage;

class ContentImageServices extends BaseServices
{
    public function __construct(ContentImageModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ContentImageModel::LIMIT_PAGE);
        $query = $this->model;
        return $query->paginate($limit);
    }

    public function show($chapterNumber)
    {

    }

    public function save(array $attributes)
    {
        if (!empty($attributes['id'])) {
            $entity = $this->model->where('id',$attributes['id'])->first();
            if ($entity) {
                $entity->fill($attributes)->save();
                return $entity;
            } else {
                return null;
            }
        } else {
            return $this->model->create($attributes);
        }
    }

    public function uploadGGDrive($request,&$comic)
    {
        $file = [];
        $file['link_img']['file'] = $request->file('link_img');

        $driveService = Storage::disk('google');

        $newPermission = app()->make('googlePermission');

        $folderId = app()->make('googleFolderId');

        $fileToUpload = $this->postGGDrive($driveService, $file['link_img']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_img']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        if(!empty($file['link_img']['url'])){
            $comic['link_img'] = $file['link_img']['url'];
        }

        return $file;
    }

    public function delete($id)
    {
        $entity = $this->model
            ->where('id', $id)->first();
        // xoa img tren ggdrive
        $result = collect($entity)->only(['link_img']);
        $this->deteleGGDrive($result->toArray());
        return !empty($entity) ? $entity->delete() : null;
    }


}
