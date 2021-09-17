@extends('adminlte::page')
@section('content')

    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Título</th>
                      <th>Título</th>
                      <th>Rate</th>
                      <th>Início</th>
                      <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($jobs as $job)
                    <tr class="clickable-row" data-href="{{ route('admin.show-job', [$job->id]) }}" role="button">
                      <td>{{ ucwords($job->title) }}</td>
                      <td>{{ ucwords($job->trainee->name) }}</td>
                      <td>{{ number_format($job->rate, 2, ',', '.' ) }} kz/hora</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('d-M-Y', strtotime($job->start_date)) }}</div>
                      </td>
                      <td>  
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $job->end_date}}</div>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="mx-auto">
                      {{ $jobs->links('vendor.pagination.bootstrap-4') }}
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