<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        Đọc Truyện Tranh Online - Website chính thức - Khotruyenfull
    </title>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="twitter:title" content="Khotruyenfull">
    <meta property="og:title" content="Khotruyenfull">
    <meta name="theme-color" content="#121212">
    <meta name="description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Khotruyenfull. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="keywords" content="It's free if you wait, free comics">
    <meta property="og:site_name" content="Khotruyenfull">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{!! asset("assets/images/logo.webp") !!}">
    <meta property="og:locale" content="vi">
    <meta property="og:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Khotruyenfull. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta property="og:url" content="https://Khotruyenfull.id.vn">
    <meta name="twitter:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Khotruyenfull. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="twitter:image" content="{!! asset("assets/images/icon-tab/120.png") !!}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kakaowebtoon_kr">
    <meta name="twitter:url" content="https://Khotruyenfull.id.vn">
    <link rel="canonical" href="https://Khotruyenfull.id.vn">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" href="{!! asset("assets/images/icon-tab/180.png") !!}"
          sizes="180x180"  type="image/x-icon">
    <link rel="icon" href="{!! asset("assets/images/icon-tab/180.png") !!}"
          sizes="180x180">
    <link rel="apple-touch-icon" href="{!! asset("assets/images/icon-tab/144.png") !!}" sizes="144x144">
    <meta name="next-head-count" content="25">

    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/plugins/plugins.mini.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<style>
html,
body {
    overscroll-behavior: auto !important
}
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P7J542KDYC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P7J542KDYC');
</script>
@include('Frontend.layouts.loader')

<div class="wrapper">
    @yield('header')
    @yield('main-content')
    @yield('footer')
</div>
@include('Frontend.components.search-modal.search-modal')
{{--@include('Frontend.layouts.footer')--}}
<script src="{!! asset('assets/js/menu.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{!! asset('assets/js/api/apiResource.js') !!}"></script>
<script src="{!! asset('assets/js/axios/axios.min.js') !!}"></script>


@yield('addtional_scripts')
<script>
    document.onkeydown = function (event) {
        if (event.keyCode == 123) {
            return false;
        }
    }

    document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
    });

    window.addEventListener('load', (event) => {
        document.getElementById('preloader').setAttribute("style", "display:none");

        let openSearch = document.querySelector('#open-tab-search-modal');
        let modalSearch = document.querySelector('#search_modal');
        let closeSearch = document.querySelector("#close-search-modal");
        closeSearch.addEventListener("click",(event)=>{
            modalSearch.style.display="none"
        })
        openSearch.addEventListener("click",(event)=>{
            modalSearch.style.display="block"
            modalSearch.classList.add("uk-open", "uk-modal-full");
        })

    });

    if ('') {
        $(".mask-sl").addClass("active-sl");
    }

    if ('') {
        console.log('')
        document.getElementById("short_link_1").removeAttribute("href");
        document.getElementById("short_link_1").onclick = function () {
            return false;
        };
        document.getElementById("short_link_1").style.color = "gray";
    }

    if ('') {
        console.log('')
        document.getElementById("short_link_2").removeAttribute("href");
        document.getElementById("short_link_2").onclick = function () {
            return false;
        };
        document.getElementById("short_link_2").style.color = "gray";
    }
</script>
</body>

</html>
