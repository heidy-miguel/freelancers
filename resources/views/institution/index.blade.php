@extends('layouts.adminlte')
@section('content')
<h1>Instituições</h1>
<div class="row">
  <div class="col-md-12">
    <div class="card card-dark">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead class="thead-dark">
            <tr>
              <th>Instituição</th>
              <th>NIF</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Telefone</th>
            </tr>
            </thead>
            <tbody>
              @foreach($institutions as $institution) 
            <tr class="clickable-row" data-href="{{ route('institution.show', [$institution->id]) }}" role="button">
              <td>{{ ucwords($institution->name) }}</td>
              <td>{{ $institution->nif }}</td>
              <td>{{ $institution->email }}</td>
              <td>{{ $institution->phone1 }}</td>
              <td>{{ $institution->phone2 }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $institutions->links() }}
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