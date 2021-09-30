@extends('layouts.app')
@push('page_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar/main.min.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Processos Criminais</span>
                <span class="info-box-number">
                  {{ $total_criminal_process->count() }}
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="far fa-file-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Processos Cíveis</span>
                <span class="info-box-number">{{ $total_civil_process->count() }}</span>
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shoe-prints"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Processos de Soltura</span>
                <span class="info-box-number">{{ $release_date }}</span>
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
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Legenda</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-warning">Processo com data de audiência</div>
                    <div class="external-event bg-danger">Processo com data de soltura</div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            <!-- TABLE: LATEST CRIMINAL PROCESS -->
            <div class="card card-primary">
              <div class="card-header border-transparent">
                <h3 class="card-title">Processo Criminal Recente</h3>

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
                  <table class="table table-striped m-0">
                    <thead>
                    <tr>
                      <th class="text-center">Número</th>
                      <th class="text-center">Data</th>
                      <th class="text-center">User</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($latest_criminal as $recent)
                        <tr class="clickable-row" data-href="{{ route('criminal-process.show', [$recent->id]) }}" role="button">
                          <td class="text-center">{{ $recent->number }}</td>
                          <td class="text-center">{{ date('d.m.Y', strtotime($recent->created_at)) }}</td>
                          <td class="text-center">{{ $recent->user->first_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route('criminal-process.index') }}" class="btn btn-sm btn-primary float-right">Ver Todos</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            <!-- TABLE: LATEST CIVIL PROCESS -->
            <div class="card card-info">
              <div class="card-header border-transparent">
                <h3 class="card-title">Processo Cívil Recente</h3>

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
                  <table class="table table-striped m-0">
                    <thead>
                    <tr>
                      <th class="text-center">Número</th>
                      <th class="text-center">Data</th>
                      <th class="text-center">User</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($latest_civil as $recent)
                    <tr class="clickable-row" data-href="{{ route('civil-process.show', [$recent->id]) }}"  role="button">
                      <td class="text-center">{{ $recent->number }}</td>
                      <td class="text-center">{{ date('d.m.Y', strtotime($recent->created_at)) }}</td>
                      <td class="text-center">{{ $recent->user->first_name }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route('civil-process.index') }}" class="btn btn-sm btn-info float-right">Ver Todos</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                  <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        <!-- /.row -->
    </div>
@endsection
@push('page_scripts')
<script type="text/javascript" src="{{ asset('js/fullcalendar/main.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/pt.js') }}"></script>

<script type="text/javascript">

    // make table row clickable
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var today = new Date();

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: today,
      initialView: 'dayGridMonth',
      lang: 'pt',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 'auto',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectMirror: true,
      nowIndicator: true,
      events: [
      @foreach($total_criminal_process as $criminal)
        {
          title: '{{ $criminal->number }}',
          start: '{{ $criminal->release_date }}',
          url: '{{ url("/criminal-process/{$criminal->id}") }}',
          backgroundColor: '#dc3545',
          borderColor: '#dc3545',
        },
        @endforeach
      @foreach($total_civil_process as $civil)
        {
          title: '{{ $civil->number }}',
          start: '{{ $civil->court_hearing_date }}',
          url: '{{ url("/civil-process/{$civil->id}") }}',
          backgroundColor: '#ffc107',
          borderColor: '#ffc107',
        },
        @endforeach
      ]
    });

    calendar.render();
  });

</script>
@endpush