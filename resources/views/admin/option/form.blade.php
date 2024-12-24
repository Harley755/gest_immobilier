@extends('admin.admin')

@section('title', $option->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')
    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route( $option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option])}}" method="POST">
        @csrf
        
        @method($option->exists ? 'PUT' : 'POST')
        

        @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'name', 'value' => $option])

        <button class="btn btn-primary mt-4">
            {{ $option->exists ? 'Modifier' : 'Ajouter' }}
        </button>

    </form>
@endsection