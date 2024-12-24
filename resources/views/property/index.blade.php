@extends('base')

@section('title', 'Tous nos biens')

@section('content')


<div class="bg-light p-5 mb-5 text-center">
   <form class="container d-flex gap-2" action="" method="GET">
       
       <input class="form-control" type="number" name="surface" id="" placeholder="Surface minimum" value="{{ $input['surface'] ?? "" }}">
       <input class="form-control" type="number" name="rooms" id="" placeholder="Nombre de pièces minimum" value="{{ $input['rooms'] ?? "" }}">
       <input class="form-control" type="number" name="price" id="" placeholder="Budget max" value="{{ $input['price'] ?? "" }}">
       <input class="form-control" type="text" name="title" id="" placeholder="Mot clé" value="{{ $input['title'] ?? "" }}">

       <button type="submit" class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
   </form>
</div>

<div class="container">
    <div class="row">
        @forelse ($properties as $property)
            <div class="col-3 mb-4">
                @include('shared.card.card')
            </div>
        @empty
            <div class="col mb-4">
                Aucun bien ne correspond à votre recherche
            </div>
        @endforelse
    </div>

    <div class="my-4">
        {{ $properties->links() }}
    </div>
</div>

@endsection