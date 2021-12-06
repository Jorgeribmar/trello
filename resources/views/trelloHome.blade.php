@extends('layouts.app')

@section('content')

    <div class="createList">
        <h1 class="title">Liste</h1>
        <form action="{{ route('home.store') }}" method="post">
            @csrf
            <input type="text" name="list_name" placeholder="Nom de votre liste"
                class="form-control
                @if ($errors->has('list_name')) is-invalid @endif">
            <br>
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
    </div>

    <!--Affichage de la liste/column-->
    <div class="trelloHome">
        @foreach ($column as $toto)
            <div class="list">
                <div class="header_list">
                    <h2 class="title">{{ $toto->list_name }}</h2>
                </div>
                <div class="header_list">
                    <div class="modifList">
                        <form action="{{ route('list.edit', $toto->id_list) }}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="text" name="edit_list" id="edit_list" placeholder="Modifiez le nom de votre liste">
                            <button type="submit"><img class="modifButton" src="../assets/valid.png" alt=""></button>
                        </form>
                        <form action="{{ route('list.destroy', $toto->id_list) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="modifButton2" type="submit"><img src="../assets/clear.png" alt=""></button>
                        </form>
                    </div>

                </div>

                <!--Affichage de la liste-->
                <div class="addTask">
                    <form action="{{ route('home.card.storeCard') }}" method="post">
                        @csrf
                        <input hidden type="text" name="id_list" value="{{ $toto->id_list }}">
                        <input hidden type="text" name="id_user" value="{{ $toto->id_user }}">
                        <input hidden type="text" name="description" value="description text">
                        <input type="text" name="card_name" placeholder="Tâche à ajouter"
                            class="form-control
                        @if ($errors->has('card_name')) is-invalid @endif">

                        <button class="btn btn-info" type="submit">Valider</button>
                    </form>
                </div>
                <br>

                <!--Affichage des cartes/tâches-->
                @foreach ($toto->cards as $card)
                    <div class="fullCard">
                        <div class="cardDetails">
                            <p>{{ $card->card_name }}</p>
                            <a class="btn btn-primary" href="{{ route('card.show', $card->id_card) }}">Voir détails</a>
                        </div>

                        <div class="editCard">
                            <form class="formModif" action="{{ route('card.edit.custom', $card->id_card) }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <input type="text" name="edit_card">
                                <button class="btn btn-info" type="submit"> Modifier </button>
                            </form>
                        </div>

                        <div class="deleteCard">
                            <form action="{{ route('card.destroy.custom', $card->id_card) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Supprimer la carte</button>
                            </form>
                        </div>
                    </div>


                @endforeach

            </div>

        @endforeach
    </div>






    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif

@endsection


<style>
    .trelloHome {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 350px;
        margin-left: 20px;

    }

    .title {
        font-size: 1.5rem;
    }

    .modifList {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
    }

    form {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .modifButton {
        background-color: white;
        border-radius: 100px;
        width: 25px;
    }

    .modifButton:hover {
        width: 30px;
    }

    .modifButton:active {
        width: 20px;
    }

    .modifButton2 {
        border-radius: 100px;
        padding-top: 8px;
        width: 20px;
    }

    .modifButton2:hover {
        width: 30px;
    }

    .modifButton2:active {
        width: 25px;
    }



    .modifList button {
        margin-top: 10px;
    }

    .addTask {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .addTask button {
        margin-top: 10px;
    }

    .fullCard {
        display: flex;
        flex-direction: column;
        border-top: 2px solid black;
        padding-top: 5px;

    }

    .cardDetails {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .editCard {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: space-between;
        padding-top: 10px;
    }

    .editCard button {
        margin-top: 10px;
    }

    .list {
        background-color: #C0B283;
        border: 2px solid #373737;
        border-radius: 8px;
        box-shadow: 2px 2px 8px black;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 20px;
        margin: 1%;
    }

    .list_title {
        color: rgb(69, 160, 69);
    }

    .header_list {

        display: flex;
        align-items: flex-end;
        margin: 1%;
    }

    img {
        margin-left: 20px;
        padding-left: 5px;

    }

</style>
