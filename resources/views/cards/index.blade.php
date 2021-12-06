@extends('layouts.app')

@section('content')
    <h1>Liste de tous les cartes</h1>
    <a href="{{ route('cards.create') }}" class="btn btn-primary">Créer une nouvelle carte</a>
    <br><br>
    @if(isset($cards))
        @foreach($cards as $card)
            <div class="card">
                <h5 class="card-header">Nom de la carte: {{ $card->card_name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">description: {{ $card->description }}</h5>
                    <a class="btn btn-primary" href="{{ route('cards.show', $card->id_card) }}">Voir la carte</a>
                    <a class="btn btn-warning" href="{{ route('cards.edit', $card->id_card) }}">Editer le post</a>

                    <form action="{{ route('cards.destroy', $card->id_card) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer la carte</button>
                    </form>
                </div>
            </div>
            <br>
        @endforeach
    @endif
@endsection
