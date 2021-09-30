@extends('layouts.adminlte')
@section('content')
<h1>Formadores</h1>
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
              <th>E-mail</th>
              <th>Telefone</th>
            </tr>
            </thead>
            <tbody>
              @foreach($trainers $trainer) 
            <tr class="clickable-row" data-href="{{ route('trainer.show', [$trainer->id]) }}" role="button">
              <td>{{ ucwords($trainer->full_name) }}</td>
              <td>{{ $trainer->email }}</td>
              <td>{{ $trainer->phone }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $trainers->links() }}
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