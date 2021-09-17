@extends('adminlte::page')
@section('title', 'Formadores  | Freelancers Consulting')
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
                      <th>Profissão</th>
                      <th>Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($instructors as $instructor)
                    <tr class="clickable-row" data-href="{{ route('admin.show-instructor', [$instructor->id]) }}" role="button">
                      <td>
                        <img src="{{ asset('storage/img/instructors/' . $instructor->picture ) }}" alt="{{ ucwords($instructor->name) }}" class="img-circle mr-2" style="width: 32px; height: 32px">
                        {{ ucwords($instructor->name) }}
                      </td>
                      <td>{{ ucwords($instructor->profession) }}</td>
                      <td>{{ number_format($instructor->rate, 2, ',', '.' ) }} kz/hora</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="mx-auto">
                      {{ $instructors->links('vendor.pagination.bootstrap-4') }}
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