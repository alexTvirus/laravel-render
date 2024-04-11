@extends("Frontend.layouts.master")
@section("header")
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="banner">
                    <a href="">
                        <img src="{!! asset("assets/images/logo.png") !!}" alt="">
                    </a>

                </div>
                <div class="nav-bar-anchor"
                     style="top: 44px;background-color: rgba(var(--background), var(--tw-bg-opacity));">
                    <div class="nav-bar">
                        <ul class="list-item">
                            @foreach($genres as $genre)
                                <li class="item">
                                    <a class="{{ $loop->index == 0?"active":"" }}" href="">{{$genre->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <div id="block-search" class="block-search">
            <div class="col-right">

            </div>
            <div class="col-left">

                <a href="" class="search-btn">
                    <img src="{!! asset("assets/images/search.svg") !!}" alt="">
                </a>
                <div id="open-tab-nav-header" class="menu-btn">
                    <img src="{!! asset("assets/images/menu.svg") !!}" alt="">
                </div>
            </div>

        </div>

        <div class="tab-nav-header" id="tab-nav-header">
            <button id="close-tab-nav-header" class="close-tab-nav-header">
                <img src="{!! asset("assets/images/close.svg") !!}" alt="close">
            </button>
            <ul>
                <li class="nav-item">
                    <a href="" class="s13-bold-white">Liên hệ</a>
                    <ul class="sub-contact">
                        <li>
                            <a target="_blank" href="https://m.me/AlexVrt1">
                                <img src="{!! asset("assets/images/messenger.webp") !!}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="mailto:firecomic247@gmail.com">
                                <img src="{!! asset("assets/images/email.webp") !!}" alt="">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
@endsection
@section("main-content")
    <div class="main">
        <div class="container">
            <div class="cards">
                @foreach($comics as $comic)
                    <div class="card">
                        <a href="{{ route('comic-info', ['comic_code' => $comic->comic_code]) }}">
                            <picture>
                                <img class="lazyload bg-img" src="{!! asset('assets/images/loadspinner.svg') !!}" data-src="{!! asset($comic->link_bg) !!}" alt="HentaiVN - Ảnh 9 - Kanojo Saimin - Chap 2 - Hypnosis Girlfriend">
{{--                                <img class="lazyload" data-src="{!! asset($comic->link_bg) !!}"--}}
{{--                                     alt="">--}}
                            </picture>
                            <picture>
                                <img class="lazyload char-img"
                                     src="{!! asset('assets/images/loadspinner.svg') !!}"
                                     data-src="{!! asset($comic->link_banner) !!}" alt="">
                            </picture>
                            <div class="label-time-content">
                                <div class="time">
                                    <img class="lazyload"
                                         src="{!! asset('assets/images/loadspinner.svg') !!}"
                                         data-src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                                    <span class=" content-overflow">{{ $comic?->diff_time }}</span>
                                </div>
                                <div class="comic-name">
                                    <img class="lazyload"
                                         src="{!! asset('assets/images/loadspinner.svg') !!}"
                                         data-src="{!! asset($comic->link_comic_name) !!}" alt="">
                                </div>
                            </div>
                            <div class="chapter">
                                <span
                                    class=" content-overflow">{{ $comic?->chapters?->last()?->chapter_name??'' }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
@section("footer")
    <div class="footer">
        <div class="container-fluid">
            <div class="container">
                <div class="copyright">
                    <a href="#">
                        <p class="name">© FIRE COMIC</p>
                    </a>

                </div>
            </div>
        </div>
        <div id="test">

        </div>
        <div id="test1">

        </div>
    </div>

@endsection
@section('addtional_scripts')

    <script >
        document.addEventListener("DOMContentLoaded", function () {
            new IOlazy({
                image: 'img'
            });
        });
    </script>
@endsection
