<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Blogs for app devs', 'Blogs for app devs') }}</title>

    <!-- Scripts -->
    <script>

    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src = "{{ asset('js/js.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-pink shadow-sm">
            <div class="container">
                @guest
                    @if (Route::has('home'))
                <a class="navbar-brand" href="{{ route('webLogin') }}">
                    @endif
                @endguest
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('Articles for app devs', 'Articles for app devs') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a href="{{ route('writeArticle') }} " class="nav-link" > Write an article</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
function openArticlePage(id) {
    console.log(id);
    let url = "{{ route('viewArticle', ':id') }}";
    url = url.replace(':id', id);
    document.location.href = url;
}

function submitArticle() {
    let url = "{{ route('viewArticle', ':id') }}";
    url = url.replace(':id', id);
    document.location.href = url;
}

function deleteArticle(id) {
    let url = "{{ route('deleteArticleWeb', ':id') }}";
    url = url.replace(':id', id);
    // console.log(url);
    //document.location.href = url;
}

function pisanjeKom() {
    var forma = document.getElementById("pisanjeKomentara");
        forma.style.display = "block";
    window.scrollTo(0,document.body.scrollHeight);
    console.log(forma.style);
}
</script>
