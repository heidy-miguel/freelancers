@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
            <div class="col-xl-8 order-xl-1 mx-auto">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nova Categoria') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('subcategory.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Informação da Especialidade') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="category_id">{{ __('Nome') }}</label>
                                    <select name="category_id" class="form-control"  required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ ucwords($category->name) }}
                                        </option>
                                        @endforeach

                                    @if ($errors->has('not_allow'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('not_allow') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">{{ __('Nome') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('not_allow'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('not_allow') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
    </div>

@endsection