@extends('layouts.app')
@section('content')
    <div class="error-page">
    <h2 class="headline text-warning"> 404</h2>
    <h3> Oops! Página não encontrada.</h3>
    <div class="error-content">
      @if(Session::has('message'))
      <p>
        Não conseguimos encontrar {{ Session::get('message') }} que procuras.
      </p>
      @endif
      <a class="btn btn-warning" href="{{ route('home') }}">Dashboard</a>.
    </div>
    </div>
@endsection