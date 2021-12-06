<form action="{{ route('home.description.storeDescription', $card->id_card) }}" method="post">
    @method('PUT')
    @csrf
    <textarea type="text" name="description" placeholder="La description de la carte"
        value="{{ $card->description }}"></textarea>
    <br>
    <button class="link" type="submit">Valider</button>

    <h5 class="card-title">{{ $card->description }}</h5>
