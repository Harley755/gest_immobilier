@extends('base')

@section('title', 'Accueil')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <x-alert type="success" class="fw-bold">
                Mes informations
            </x-alert>

            <h1>Agence lorem</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda ipsum voluptates excepturi, repellendus provident reiciendis amet, in consectetur sit illo neque exercitationem? Deleniti non quasi dignissimos expedita neque modi.</p>
        </div>
    </div>


    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @forelse ($properties as $property)
                <div class="col">
                    @include('shared.card.card')
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
@endsection