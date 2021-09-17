@extends('adminlte::page')
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
        <h3 class="widget-user-username">{{ Auth::guard('trainee')->user()->name }}</h3> 
        <h5 class="widget-user-desc">{{ Auth::guard('trainee')->user()->description }}</h5>
      </div>
      <div class="widget-user-image"> 
        <img class="img-circle elevation-2" src="{{ asset('storage/img/trainee/' . Auth::guard('trainee')->user()->picture ) }}" style="width: 100px; height: 100px" alt="{{ ucwords(Auth::guard('trainee')->user()->name) }}">
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
              <a class="nav-link" id="custom-tabs-one-education-tab" data-toggle="pill" href="#custom-tabs-one-education" role="tab" aria-controls="custom-tabs-one-education" aria-selected="false">Formação</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Solicitações</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form method="post" action="{{ route('trainee.update') }}" class="form-horizontal">
                @csrf
                <input type="hidden" name="trainee_id" value="{{ Auth::guard('trainee')->user()->id }}">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ Auth::guard('trainee')->user()->name }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">Cidade</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" id="city" value="{{ Auth::guard('trainee')->user()->city }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" value="{{ Auth::guard('trainee')->user()->address }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::guard('trainee')->user()->phone }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="{{ Auth::guard('trainee')->user()->email }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="picture" class="col-sm-2 col-form-label">Fotografia</label>
                    <div class="col-sm-10">
                      <input type="file" name="picture" class="form-control" id="picture">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label for="end_date" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                      <textarea rows="5" style="width: 100%;" name="description">{{ Auth::guard('trainee')->user()->description }}</textarea>
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark float-right">Sign in</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        @foreach(Auth::guard('trainee')->user()->jobs as $job)
                      <div>

                        <i class="fas fa-envelope bg-dark"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $job->start_date }} - {{ $job->end_date }}</span>

                          <h3 class="timeline-header"><a href="{{ route('job.show', [$job->id]) }}">{{ $job->title }}</a>
                          <small> | ddd | </small></h3>

                          <div class="timeline-body">
                            {{ $job->description }}
                          </div>
                          <div class="timeline-footer">
                            <a href="{{ route('job.index', [$job->id]) }}" class="btn btn-dark btn-sm">Ver mais</a>
                          </div>
                        </div>
                      </div>
                        @endforeach
                      <!-- END timeline item -->

                      <div>
                            <a href="#" id="more-job-btn" class="btn btn-dark btn-sm">Mais solicitação</a>
                      </div>
                    </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>

@include('dashboard.trainee.modal.job')
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function($){
      $('.select2').select2();

      // make table row clickable
      $(".clickable-row").click(function() {
        window.location = $(this).data("href");
        });

      $('#more-job-btn').click(function(e){
        $('#job-modal').modal('show');
      });
    });
</script>
@endpush