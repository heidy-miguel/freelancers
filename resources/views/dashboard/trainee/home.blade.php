@extends('adminlte::page')

@section('title', 'Usuários')
@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/dropzone/min/dropzone.min.css') }}">
@endpush
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('img/trainees/')}}/{{ Auth::guard('trainee')->user()->picture }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::guard('trainee')->user()->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-success btn-block"><b>XXXXXX</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ Auth::guard('trainee')->user()->address }}</p>
                <p class="text-muted">{{ Auth::guard('trainee')->user()->address }} - Angola</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  @foreach(Auth::guard('trainee')->user()->trainings as $training)
                  <span class="badge badge-primary">{{ $training->name }}</span>
                  @endforeach
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{ Auth::guard('trainee')->user()->description }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->

                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Curso</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Valor</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach(Auth::guard('trainee')->user()->trainings as $training)
                  <tr class="clickable-row" data-href="{{ route('training.show', [$training->id]) }}" role="button">
                    <td>{{ $training->course->name }}</td>
                    <td>{{ date('d-M-Y', strtotime($training->start_date)) }}</td>
                    <td>{{ date('d-M-Y', strtotime($training->end_date)) }}</td>
                    <td>{{ number_format($training->course->rate, 2, ',', '.' ) }} kz</td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div> 
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal dropzone" method="post" action="{{ route('trainee.update') }}" id="instructor-form" enctype="multipart/form-data">
                      @method('post')
                      @csrf
                      <input type="hidden" name="id" value="{{Auth::guard('trainee')->user()->id}}">
                      <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="{{ Auth::guard('trainee')->user()->name }}" placeholder="Nome" required>
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label for="middle_name" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" id="address" value="{{ Auth::guard('trainee')->user()->address }}" placeholder="Endereço">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label">Cidade</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="city" id="city" value="{{ Auth::guard('trainee')->user()->city }}" placeholder="city" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="emaill" value="{{ Auth::guard('trainee')->user()->email}}" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::guard('trainee')->user()->phone }}" placeholder="Name">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="experience" class="col-sm-2 col-form-label">Imagem</label>
                        <div class="col-sm-10">
                          <input type="file" name="image">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> Concordo com os <a href="#">termos e condições</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
<a href="{{ route('trainee.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@push('js')
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/toastr/toastr.min.js') }}"></script>
<script>
    // make table row clickable
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    }); 

  $(function () {
    // make table row clickable
  $('.select2').select2()

    // message notification
    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @endif
  });
</script>
@endpush
