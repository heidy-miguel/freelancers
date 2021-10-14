@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
            <div class="col-xl-8 order-xl-1 mx-auto">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Editar Solicitação') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('application.update', [$application->id]) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <input type="hidden" name="user_role" value="{{auth()->user()->role}}">
                            <h6 class="heading-small text-muted mb-4">{{ __('Informação da Solicitação') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Formação Pretendida') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Formação Pretendida') }}" value="{{ old('title') }}{{ $application->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="start_date">{{ __('Data de Inicio') }}</label>
                                    <input type="date" name="start_date" class="form-control form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Data de inicio') }}" value="{{ old('start_name') }}{{ $application->start_date }}" required>

                                    @if ($errors->has('start_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="end_date">{{ __('Data Final') }}</label>
                                    <input type="date" name="end_date" class="form-control form-control-alternative{{ $errors->has('end_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Data de final') }}" value="{{ old('end_name') }}{{ $application->end_date }}" required>

                                    @if ($errors->has('end_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                
                                <div class="form-group{{ $errors->has('trainer_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="trainer_id">{{ __('Formador') }}</label>
                                    <select name="trainer_id" id="trainer_id" class="form-control">
                                        @foreach($trainers as $trainer)
                                            <option value="{{ $trainer->id }}">
                                              {{ ucwords($trainer->full_name) }}
                                              @foreach($trainer->subcategories as $sub)
                                              | {{ $sub->name }} ({{$sub->category->name}}) 
                                              @endforeach
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('trainer_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('trainer_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('manager_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="manager_id">{{ __('Gestor de Formação') }}</label>
                                    <select name="manager_id" class="form-control">
                                        @foreach($managers as $manager)
                                          @if($manager->id == $application->user->id)
                                            <option value="{{ $manager->id }}" selected>
                                              {{ ucwords($manager->full_name) }}
                                            </option>
                                          @else
                                            <option value="{{ $manager->id }}">
                                              {{ ucwords($manager->full_name) }}
                                            </option>
                                          @endif
                                        @endforeach
                                    </select>

                                    @if ($errors->has('manager_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('manager_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                  <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                      <label class="form-control-label" for="category_id">{{ __('Categoria') }}</label>
                                      <select name="category_id" class="form-control">
                                          @foreach($categories as $category)
                                            @if($category->id == $application->category->id)
                                              <option value="{{ $category->id }}" selected>
                                                {{ ucwords($category->name) }}
                                              </option>
                                            @else
                                              <option value="{{ $category->id }}">
                                                {{ ucwords($category->name) }}
                                              </option>
                                            @endif
                                          @endforeach
                                      </select>

                                      @if ($errors->has('category_id'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('category_id') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description">{{ __('Objectivo da Formação') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="8">{{ $application->description }}</textarea>

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