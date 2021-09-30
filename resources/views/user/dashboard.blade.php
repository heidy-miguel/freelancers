@extends('layouts.adminlte')
@section('content')
<h1>Dahsboard</h1>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Percentagem</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Solicitações</span>
                <span class="info-box-number">{{ $total_solicitations }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Instituições Registadas</span>
                <span class="info-box-number">{{ $total_institutions }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Formadores Registados</span>
                <span class="info-box-number">{{ $total_trainers }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-dark">
      <div class="card-header border-transparent">
        <h3 class="card-title">Solicitações Recentes</h3> 

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>Formação Pretendida</th>
              <th>Categoria</th>
              <th>Data de Início</th>
              <th>Data Final</th>
              <th>Gestor da Formação</th>
              <th>Instituição</th>
            </tr>
            </thead>
            <tbody>
              @foreach($solicitations as $solicitation) 
            <tr class="clickable-row" data-href="{{ route('solicitation.show', [$solicitation->id]) }}" role="button">
              <td>{{ ucwords($solicitation->title)}}</td>
              <td>
                @foreach($solicitation->categories as $category)
                {{ ucwords($category->name )}}
                @endforeach
              </td>
              <!-- <td><span class="badge badge-success">Shipped</span></td> -->
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('d-M-Y', strtotime($solicitation->start_date)) }}</div>
              </td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('d-M-Y', strtotime($solicitation->end_date)) }}</div>
              </td>
              <td>
                @if(isset($solicitation->user->name))
                {{ ucwords($solicitation->user->name )}}
                @else
                unknow
                @endif
              </td>
              <td>
                @if(isset($solicitation->institution->name))
                {{ ucwords($solicitation->institution->name )}}
                @else
                unknow
                @endif
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="{{ route('solicitation.index') }}" class="btn btn-sm btn-dark float-right">Ver Todas</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="card card-dark">
      <div class="card-header border-transparent">
        <h3 class="card-title">Formadores Recentes</h3> 

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>E-mail</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trainers as $trainer) 
            <tr class="clickable-row" data-href="{{ route('trainer.show', [$trainer->id]) }}" role="button">
              <td>{{ ucwords($trainer->fullname) }}</td>
              <td>{{ $trainer->phone }}</td>
              <td>{{ $trainer->email }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="#" class="btn btn-sm btn-dark float-right">Ver Todas</a>
      </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card card-dark">
      <div class="card-header border-transparent">
        <h3 class="card-title">Instituições Recentes</h3> 

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>Instituição</th>
              <th>Telefone</th>
              <th>E-mail</th>
            </tr>
            </thead>
            <tbody>
              @foreach($institutions as $institution) 
            <tr class="clickable-row" data-href="#" role="button">
              <td>{{ ucwords($institution->name) }}</td>
              <td>{{ $institution->phone1 }}</td>
              <td>{{ $institution->email }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="{{ route('trainer.index') }}" class="btn btn-sm btn-dark float-right">Ver Todas</a>
      </div>
    </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function($){
            // make table row clickable
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endpush