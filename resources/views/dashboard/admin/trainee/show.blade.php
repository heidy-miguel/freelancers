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
        <h4 class="widget-user-username">{{ ucwords($trainee->name) }}</h4>
      </div>
      <div class="widget-user-image"> 
        <img class="img-circle elevation-2" src="{{ asset('storage/img/trainees/' . $trainee->picture ) }}" style="width: 100px; height: 100px" alt="{{ ucwords($trainee->name) }}">
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
              <h5 class="description-header">{{ $total_jobs }}</h5>
              <span class="description-text">Trabalhos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

        <div class="row">
          <div class="col-12 col-md-8 mx-auto">
            <div class="card card-dark card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Dados Pessoais</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Solicitações</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <form method="post" action="" class="form-horizontal">
                      @csrf
                      <input type="hidden" name="trainee_id" value="{{ $trainee->id }}">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" value="{{ $trainee->name }}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="address" value="{{ $trainee->address }}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" value="{{ $trainee->email }}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" value="{{ $trainee->phone }}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                          <textarea readonly rows="5" style="width: 100%;">{{ $trainee->description}}</textarea>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-dark float-right">Sign in</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr>
                      <th>Título</th>
                      <th>Estato</th>
                      <th>Rate</th>
                      <th>Início</th>
                      <th>Fim</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($paginated_jobs as $job)
                        <tr class="clickable-row" data-href="{{ route('admin.show-job', [$job->id]) }}" role="button">
                          <td>{{ ucwords($job->title)}}</td>
                          <td><span class="badge badge-success">Shipped</span></td>
                          <td class="float-right">{{ number_format($job->rate, 2, ',', '.' ) }}</td>
                          <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('d-M-Y', strtotime($job->start_date)) }}</div>
                          </td>
                          <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('d-M-Y', strtotime($job->end_date)) }}</div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      {{ $paginated_jobs->links('vendor.pagination.bootstrap-4') }}
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
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
    });
</script>
@endpush