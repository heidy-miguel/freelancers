@extends('layouts.adminlte')
@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username">{{ Auth::guard('institution')->user()->name }}</h3> 
        <h5 class="widget-user-desc">{{ Auth::guard('institution')->user()->description }}</h5>
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
              <span class="description-text">Trabalhos</span>
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
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Minhas Solicitações</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form method="post" action="{{ route('institution.update') }}" class="form-horizontal">
                @csrf
                <input type="hidden" name="institution_id" value="{{ Auth::guard('institution')->user()->id }}">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ Auth::guard('institution')->user()->name }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nif" class="col-sm-2 col-form-label">NIF</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nif" id="nif" value="{{ Auth::guard('institution')->user()->nif }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" value="{{ Auth::guard('institution')->user()->address }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone1" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone11" id="phone11" value="{{ Auth::guard('institution')->user()->phone1 }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="{{ Auth::guard('institution')->user()->email }}">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label for="end_date" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                      <textarea rows="5" style="width: 100%;" name="description">{{ Auth::guard('institution')->user()->description }}</textarea>
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right">Salvar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div>
                      <a href="{{ route('solicitation.create') }}" id="more-solicitation-btn" class="btn btn-dark btn-sm">Nova Solicitação</a>
                    </div>
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        @foreach(Auth::guard('institution')->user()->solicitations as $solicitation) 
                      <div>

                        <i class="fas fa-envelope bg-dark"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> Data da Solicitação: {{ date('d-M-Y', strtotime($solicitation->created_at)) }}</span>

                          <h3 class="timeline-header"><a href="{{ route('solicitation.show', [$solicitation->id]) }}">{{ $solicitation->title }}</a>
                          </h3>

                          <div class="timeline-body">
                            {{ $solicitation->description }}
                          </div>
                          <div class="timeline-footer">
                            <a href="{{ route('solicitation.index', [$solicitation->id]) }}" class="btn btn-dark btn-sm">Ver mais</a>
                            <a href="{{ route('solicitation.edit', [$solicitation->id]) }}" class="btn btn-dark btn-sm">Editar</a> 
                          </div>
                        </div>
                      </div>
                        @endforeach
                      <!-- END timeline item -->


                    </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
@include('institution.modal.solicitation')
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function($){

      // make table row clickable
      $(".clickable-row").click(function() {
        window.location = $(this).data("href");
        });

      $('#more-solicitation-btn').click(function(e){
        $('#solicitation-modal').modal('show');
      });
    });
</script>
@endpush