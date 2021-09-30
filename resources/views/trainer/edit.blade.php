@extends('layouts.adminlte')
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username">{{ ucwords(Auth::guard('trainer')->user()->full_name) }}</h3> 
        <br>
        <h5 class="widget-user-desc">{{ Auth::guard('trainer')->user()->bio }}</h5>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">3,200</h5>
              <span class="description-text">SALES</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
              <span class="description-text">FOLLOWERS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">45646</h5>
              <span class="description-text">
                <a href="{{ route('trainer.edit', [Auth::guard('trainer')->user()->id]) }}">Editar</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
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
              <form method="post" action="{{ route('trainer.update') }}" class="form-horizontal" enctype="">
                @csrf
                <input type="hidden" name="trainer_id" value="{{ Auth::guard('trainer')->user()->id }}">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ ucwords(Auth::guard('trainer')->user()->name) }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="surname" class="col-sm-2 col-form-label">Apelido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="surname" id="surname" value="{{ ucwords(Auth::guard('trainer')->user()->surname) }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="profession" class="col-sm-2 col-form-label">Profissão</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="profession" id="profession" value="{{ ucwords(Auth::guard('trainer')->user()->profession) }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="birth_date" class="col-sm-2 col-form-label">Data de Nascimento</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{ Auth::guard('trainer')->user()->birth_date }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" value="{{ Auth::guard('trainer')->user()->address }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::guard('trainer')->user()->phone }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="{{ Auth::guard('trainer')->user()->email }}">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label for="end_date" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                      <textarea rows="5" style="width: 100%;" name="description">{{ Auth::guard('trainer')->user()->bio }}</textarea>
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark float-right">Salvar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush 