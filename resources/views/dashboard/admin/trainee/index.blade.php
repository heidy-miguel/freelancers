@extends('adminlte::page')
@section('title', 'Trainee  | Freelancers Consulting')
@section('content')

    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Instrutores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Telefone</th>
                      <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($trainees as $trainee)
                    <tr class="clickable-row" data-href="{{ route('admin.show-trainee', [$trainee->id])}}" role="button">
                      <td>{{ ucwords($trainee->name) }}</td>
                      <td>{{ ucwords($trainee->phone) }}</td>
                      <td>{{ $trainee->email }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="mx-auto">
                      {{ $trainees->links('vendor.pagination.bootstrap-4') }}
                  </div>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
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