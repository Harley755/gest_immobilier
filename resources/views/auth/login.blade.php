@extends('base')

@section('title', 'Se connecter')

@section('content')
<div class="container mt-4">
    <h1>@yield('title')</h1>

    @include('shared.flash')

    <form method="post" action="{{ route('login') }}" class="vstack gap-3">
        @csrf
        @method('post')

        @include('shared.input', ['class' => 'col', 'label' => 'Email', 'name' => 'email', 'type' => 'email'])
        @include('shared.input', ['class' => 'col', 'label' => 'Mot de passe', 'name' => 'password', 'type' => 'password'])

        <div>
            <button class="btn btn-primary">
                Se connecter
            </button>
        </div>
    </form>
</div>
@endsection