@extends('layouts.adminlte')
@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto mt-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-dark card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <h3 class="widget-user-username">{{ ucwords($solicitation->title) }}</h3>
                <h5 class="widget-user-desc">
                  @if(isset($solicitation->institution->name))
                  {{ ucwords($solicitation->institution->name) }}
                  @else
                  unknown
                  @endif
                </h5>
              </div>

              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ date('d-M-Y', strtotime($solicitation->start_date)) }}</h5>
                      <span class="description-text">Data de Início</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ date('d-M-Y', strtotime($solicitation->end_date)) }}</h5>
                      <span class="description-text">Data Final</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                      <a href="{{ route('solicitation.edit', [$solicitation->id]) }}" class="btn btn-success btn-xl">Editar</a>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          </div>
        </div>
            <!-- /.widget-user -->
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="card card-dark card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Informação Geral</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <form class="form-horizontal" action="{{ route('user.set-manager', [$solicitation->id]) }}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="title" class="col-sm-2 col-form-label">Formação Pretendida</label>
                          <div class="col-sm-10">
                            <input type="text" name="title" value="{{ ucwords($solicitation->title) }}" class="form-control" id="title" placeholder="Formação Pretendida">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="start_date" class="col-sm-2 col-form-label">Data de Início</label>
                          <div class="col-sm-10">
                            <input type="date" name="start_date" value="{{ $solicitation->start_date}}" class="form-control" id="start_date" placeholder="Data inicial">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="end_date" class="col-sm-2 col-form-label">Data de Início</label>
                          <div class="col-sm-10">
                            <input type="date" name="end_date" value="{{ $solicitation->end_date}}" class="form-control" id="end_date" placeholder="Data inicial">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="categories" class="col-sm-2 col-form-label">Categoria</label>
                          <select class="select2 col-sm-10 form-control" name="categories[]" multiple="multiple" id="categories">
                            @foreach($categories as $category)
                              @if(in_array($category->id, $solicitation->categories->pluck('id')->toArray()))
                                <option value="{{ $category->id }}" selected>
                                  {{ $category->name }}
                                </option>
                              @else
                                <option value="{{ $category->id }}">
                                  {{ $category->name }}
                                </option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="end_date" class="col-sm-2 col-form-label">Gestor da Formação</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" name="user_id">
                              @if(isset($solicitation->user->id))
                                @foreach($users as $user)
                                  @if($user->id === $solicitation->user->id)
                                    <option value="{{ $user->id}}" selected>{{ ucwords($user->full_name) }}</option>
                                  @endif
                                  
                                  @if($user->id !== $solicitation->user->id)
                                  <option value="{{ $user->id }}">{{ ucwords($user->full_name) }}</option>
                                  @endif
                                @endforeach
                              @else
                              <option selected>Selectionar Gestor de Formação</option>
                                @foreach($users as $user)
                                  <option value="{{ $user->id}}">{{ ucwords($user->full_name) }}</option>
                                @endforeach
                              @endif

                            </select>
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="end_date" class="col-sm-2 col-form-label">Objectivos da formação</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="10">{{ $solicitation->description }}</textarea>
                          </div>
                        </div> 
                      </div>
                    </form>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
jQuery(document).ready(function($) {
  $('.select2').select2()
    
  });

    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @endif
</script>
@endpush 