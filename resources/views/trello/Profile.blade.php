@extends('layouts.app')


@section('content')

<div class="profilePage">
    <h1 class="profileTitle">Votre Profil</h1>


    <div id="profileCard" style="width: 30rem; height: 30rem;">
        <div id="profileElement" class="card-body">
        <h5 id="subTitleProfile" class="card-title">Informations du profil</h5>
        <p class="card-text">Ci-dessous les informations saisies lors de votre inscription</p>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item"> Nom : {{ $profileName}}</li> <br>
        <li class="list-group-item"> Email : {{ $profileEmail}} </li> <br>
        <li class="list-group-item"> Mot de Passe : Private </li>
        </ul>
        <div id="profileButtons" class="card-body">
            <a class="button1" href="{{route('profile.edit', $profileIdFront)}}">Modifier profil</a>
            <a class="butt2" href="{{route('profile.index')}}">Retour</a>
        </div>
    </div>
</div>

@endsection
