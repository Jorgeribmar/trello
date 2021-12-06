<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div id="navBarOrga" class="container-fluid">
            <div class="leftSide">
                <a id="linkSize" class="navbar-brand" href="/">Trello Premium</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <a class="nav-link" href="{{ route('profile.show', Auth::id()) }}">Mon Profil</a>
                    <!--lien qui marche-->
                    <!--<a class="nav-link" href="{{ route('profile.show', $profileVariableFront ?? '') }}">Mon Profil</a> -->
                    <!--lien qui ne marche pas-->
                </div>
            </div>
            <div class="rightSide">

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="button1">Se déconnecter</button>
                </form>

                <a id="newListButton" type="button" href="{{ route('home.show', Auth::id()) }}"
                    class="button2">Créer nouvelle liste</a>
                <!--lien qui marche -->
                <!--<a type="button" href="{{ route('home.show', $user->id ?? '') }}" class="btn btn-outline-success x-3">Crée nouvelle listes</a>-->
                <!--lien qui ne marche pas-->

            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
<style>
    .button1 {
        background-color: #373737;
        color: white;
        border-radius: 50% 20% / 10% 40%
    }

    .button1 {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1:hover {

        color: white;

    }

    .button2:hover {

        color: white;

    }

    .button2 {

        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button2 {
        background-color: #C0B283;
        color: white;
        border-radius: 50% 20% / 10% 40%
    }

</style>
