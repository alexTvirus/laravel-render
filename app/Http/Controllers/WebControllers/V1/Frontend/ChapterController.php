<?php

namespace App\Http\Controllers\WebControllers\V1\Frontend;

use App\Http\Controllers\BaseController;
use App\Services\ChapterServices;
use Illuminate\Http\Request;

class ChapterController extends BaseController
{
    private $chapterServices;

    public function __construct(ChapterServices $chapterServices)
    {
        $this->chapterServices = $chapterServices;
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('Frontend.pages.comics.index');
    }

    public function show($comic_code,$id)
    {
        $comic = $this->chapterServices->getChapterByComicCodeAndChapterNumber($comic_code,$id);
        $comic->with('nextChapter','prvChapter');
        return view('Frontend.pages.chapters.index',compact('comic'));
    }

}
