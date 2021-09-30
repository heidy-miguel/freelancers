@extends('layouts.adminlte')
@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')

            <!-- /.widget-user -->
        <div class="row">
          <div class="col-md-8 mx-auto mt-5">
            <div class="card card-dark card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Editar Solicitação </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <form class="form-horizontal" action="{{ route('solicitation.update', [$solicitation->id]) }}" method="post"> 
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
                            <input type="date" name="start_date" value="{{ $solicitation->start_date }}" class="form-control" id="start_date" placeholder="Data inicial">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="end_date" class="col-sm-2 col-form-label">Data de Início</label>
                          <div class="col-sm-10">
                            <input type="date" name="end_date" value="{{ $solicitation->end_date }}" class="form-control" id="end_date" placeholder="Data inicial">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="categories" class="col-sm-2 col-form-label">Categoria</label>
                          <select class="select2 col-sm-10 form-control" name="categories[]" multiple="multiple" id="categories">
                            @foreach($categories as $category)
                              @if(in_array($category->id,$solicitation->categories->pluck('id')->toArray()))
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
                        </div>
                        <div class="form-group row">
                            <label for="instructor_id" class="col-sm-2 col-form-label">Gestor da Formação</label>
                            <div class="col-sm-10">
                              <select class="form-control select2" name="user_id">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                @endforeach
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
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Salvar</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
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
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
jQuery(document).ready(function($) {
  $('.select2').select2()
    
  });
</script>
@endpush