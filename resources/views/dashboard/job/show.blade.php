@extends('adminlte::page')
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <h3 class="widget-user-username">{{ $job->title }}</h3>
                <h5 class="widget-user-desc">{{ $job->trainee->name }}</h5>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ date('d-M-Y', strtotime($job->start_date)) }}</h5>
                      <span class="description-text">Data Inicial</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ date('d-M-Y', strtotime($job->end_date)) }}</h5>
                      <span class="description-text">Data Final</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">{{ number_format($job->rate, 2, ',', '.' )}}</h5>
                      <span class="description-text">Pagamento</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="row">
                    <div class="description-block border-top p-3">
                      <h4>Descrição</h4>
                      {{ $job->description}}
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>  
  </div>
</div>
 @endsection