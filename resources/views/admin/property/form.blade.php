@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')
    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route( $property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property])}}" method="POST">
        @csrf
        
        @method($property->exists ? 'PUT' : 'POST')
        

        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Titre', 'name' => 'title', 'value' => $property])

            <div class="col row">
                @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property])
                @include('shared.input', ['class' => 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property])
            </div>
        </div>

        @include('shared.input', ['type' => 'textarea','name' => 'description', 'value' => $property])

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property])
            @include('shared.input', ['class' => 'col','name' => 'floor','label' => 'Etage', 'value' => $property])
        </div>

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'value' => $property])
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property])
            @include('shared.input', ['class' => 'col', 'label' => 'Etage', 'name' => 'postal_code', 'value' => $property])
        </div>
        
        
        @include('shared.select', ['label' => 'Options', 'options' => $options, 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true])


        @include('shared.checkbox', ['label' => 'Vendu ?', 'name' => 'is_sell', 'value' => $property])

        <button class="btn btn-primary mt-4">
            {{ $property->exists ? 'Modifier' : 'Ajouter' }}
        </button>

    </form>
@endsection