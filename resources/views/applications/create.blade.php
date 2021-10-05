@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
            <div class="col-xl-8 order-xl-1 mx-auto">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nova Solicitação') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('application.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Informação da solicitação') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">{{ __('Formação Pretendida') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex: Formador de contabilidade, Coaching Motivacional') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif 
                                </div>
                                
                                <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="start_date">{{ __('Data de Início') }}</label>
                                    <input class="form-control  form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" type="date" required>

                                    @if ($errors->has('start_date')) 
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="end_date">{{ __('Data Final') }}</label>
                                    <input class="form-control  form-control-alternative{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" type="date" required>

                                    @if ($errors->has('end_date')) 
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="category_id">{{ __('Categoria') }}</label>
                                    <select class="form-control  form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category_id')) 
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description">{{ __('Objectivos da Formação') }}</label>
                                    <textarea class="form-control  form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="8" required></textarea>
                                    

                                    @if ($errors->has('description')) 
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
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