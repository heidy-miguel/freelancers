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
                            <h3 class="mb-0">Especialidades</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary">Adicionar especialidade</a>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Especialidade</th>
                                <th scope="col">Estado</th>
                                <th scope="col">categoria</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ ucwords($subcategory->name) }}</td>
                                <td>{{ ucwords($subcategory->category->name) }}</td>
                                <td>
                                  <span class="badge badge-dot mr-4">
                                    @if($subcategory->active)
                                    <i class="bg-success"></i>
                                    <span class="status">Activo</span>
                                    @else
                                    <i class="bg-danger"></i>
                                    <span class="status">Desactivado</span>
                                    @endif
                                  </span>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('subcategory.edit', [$subcategory->id]) }}">Editar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $subcategories->links() }}
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection