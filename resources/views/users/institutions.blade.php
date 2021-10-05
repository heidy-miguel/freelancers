@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Formadores</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">NIF</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Data de Registo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($institutions as $user)
                            <tr>
                                <td>
                                    {{ ucwords($user->name) }}
                                </td>
                                <td>{{ ucwords($user->email) }}</td>
                                <td>{{ ucwords($user->phone) }}</td>
                                <td>{{ ucwords($user->nif) }}</td>
                                <td>
                                  <span class="badge badge-dot mr-4">
                                    @if($user->active)
                                    <i class="bg-success"></i>
                                    <span class="status">Activo</span>
                                    @else
                                    <i class="bg-danger"></i>
                                    <span class="status">Desactivado</span>
                                    @endif
                                  </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $institutions->links() }}
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection