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
                            <h3 class="mb-0">Solicitações</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Formação Pretendida</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data Final</th>
                            <th scope="col">Gestor</th>
                            <th scope="col">Instituição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)
                            <tr>
                                <td>{{ ucwords($app->title) }}</td>
                                <td>{{ ucwords($app->category->name) }}</td>
                                <td>{{ date('d-M-Y', strtotime($app->start_date)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($app->end_date)) }}</td>
                                <td>{{ ucwords($app->manager->name) }}</td>
                                <td>{{ ucwords($app->user->name) }}</td>
                                
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('application.edit', [$app->id]) }}">Editar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $applications->links() }}
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection