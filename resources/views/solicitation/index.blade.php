@extends('layouts.adminlte')
@section('content')
<h1>Solicitações</h1>
<div class="row">
  <div class="col-md-12">
    <div class="card card-dark">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped m-0">
            <thead class="thead-dark">
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
                {{ ucwords($solicitation->user->full_name )}}
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
        {{ $solicitations->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
@push('page_scripts')
<script type="text/javascript">
    $(document).ready(function($){
            // make table row clickable
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endpush