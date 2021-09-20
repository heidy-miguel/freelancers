@extends('adminlte::page')
@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="width: 150px; height: 150px;" 
                       src="{{ asset('storage/img/instructors/' . $instructor->picture ) }}"
                       alt="{{ $instructor->name }}">
                </div>

                <h3 class="profile-username text-center">{{ ucwords($instructor->name) }}</h3>

                <p class="text-muted text-center">
                  {{ $instructor->profession }}
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sobre mim</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Formação</strong>
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($instructor->educations as $education)
                      <li class="item">
                        <div class="product-info" style="margin-left: 0px;">
                          <strong>{{ ucwords($education->study_area) }}</strong>
                          <span class="product-description">
                            {{ ucwords($education->degree) }} | {{ ucwords($education->school) }}
                          </span>
                        </div>
                      </li>
                    @endforeach
                    </ul>
                  <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

                <p class="text-muted">{{ $instructor->address }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Habilidades</strong>

                <p class="text-muted">
                  @foreach($instructor->skills as $skill)
                  <span class="badge bg-dark">{{ $skill->name }}</span>
                  @endforeach
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Nota</strong>

                <p class="text-muted">{{ $instructor->description }}</p>
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
                  <li class="nav-item"><a class="nav-link" href="#employment" data-toggle="tab">Experiência Profissional</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Dados Pessoais</a></li>
                  <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Formação</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        @if($errors->any())
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                        @endif
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('img/instructors/') }}/{{ $instructor->picture }}" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="employment">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        @foreach($instructor->employments as $employment)
                      <div>

                        <i class="fas fa-envelope bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $employment->start_date }} - {{ $employment->end_date }}</span>

                          <h3 class="timeline-header"><a href="#">{{ $employment->title }}</a>
                          <small> | {{ $employment->company }} | </small></h3>

                          <div class="timeline-body">
                            {{ $employment->description }}
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-danger btn-sm">Read more</a>
                          </div>
                        </div>
                      </div>
                        @endforeach
                      <!-- END timeline item -->

                      <div>
                            <a href="#" id="more-employment-btn" class="btn btn-danger btn-sm">Adicionar Mais</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="post" action="{{ route('instructor.update_personal_info') }}" enctype="multipart/form-data" class="form-horizontal" >
                      @csrf
                      @method('put')
                      <input type="hidden" name="instructor_id" value="{{ $instructor->id}}">
                      <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="first_name" id="first_name" value="{{ ucwords($instructor->first_name) }}" maxlength="150" placeholder="Nome">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="middle_name" class="col-sm-2 col-form-label">Seg. Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ ucwords($instructor->middle_name) }}" placeholder="Segundo Nome">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Apelido</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="last_name" id="last_name" value="{{ ucwords($instructor->last_name) }}" placeholder="Apelido">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="profession" class="col-sm-2 col-form-label">Profissão</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="profession" id="profession" value="{{ ucwords($instructor->profession) }}" placeholder="Profissão">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ ucwords($instructor->phone) }}" placeholder="Telefone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" value="{{ $instructor->email }}" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" id="address" value="{{ $instructor->address }}" placeholder="Endereço">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="skills" class="col-sm-2 col-form-label">Habilidades</label>
                        <div class="col-sm-10">
                          <select class="select2bs4" name="skills[]" multiple="multiple" style="width: 100%;" id="skills">
                            @foreach($skills as $skill)
                              @if(in_array($skill->id, $instructor->skills->pluck('id')->toArray()))
                                <option value="{{ $skill->id }}" selected>
                                  {{ $skill->name }}
                                </option>
                              @else
                                <option value="{{ $skill->id }}">
                                  {{ $skill->name }}
                                </option>
                              @endif
                            @endforeach
                          </select> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="picture" class="col-sm-2 col-form-label">Fotografia</label>
                        <div class="col-sm-10">
                          <input type="file" name="picture" class="form-control" id="picture">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Nota</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="description" value="{{ $instructor->description}}">{{ $instructor->description }}</textarea>
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
                          <button type="submit" class="btn btn-danger">Salvar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="education">
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        @foreach($instructor->educations as $education)
                      <div>

                        <i class="fas fa-envelope bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $education->start_date }} - {{ $education->end_date }}</span>

                          <h3 class="timeline-header"><a href="#">{{ ucwords($education->study_area) }}</a>
                          <small> | {{ ucwords($education->school) }} </small></h3>

                          <div class="timeline-body">
                            {{ $education->description }}
                          </div>
                          <div class="timeline-footer">
                      
                      <p>
                        @foreach($education->certificates as $certificate )
                        <a href="{{ asset('storage/docs/instructors/' . $certificate->name ) }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $certificate->name }}</a>
                        @endforeach
                      </p>
                          </div>
                        </div>
                      </div>
                        @endforeach
                      <!-- END timeline item -->

                      <div>
                            <a href="#" id="more-education-btn" class="btn btn-danger btn-sm">Adicionar Mais</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@include('dashboard.instructor.modal.employment')
@include('dashboard.instructor.modal.education')
@include('dashboard.instructor.modal.language')
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function($) {
    $('.select2').select2();

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    var country_url = "{{ asset('countries.json') }}";
    $.getJSON(country_url, function(data) {
        $.each(data, function(index, val) {
          $('#country').append('<option>' + val.name + '</option>'); 
        });
    });

    var city_url = "{{ asset('city.json') }}";
    $.getJSON(city_url, function(data) {
        $.each(data, function(index, val) {
          $('#city').append('<option>' + val.name + '</option>'); 
        });
    });

    $('#more-employment-btn').on('click', function(e){
      e.preventDefault();
      $('#employment-modal').modal('show');
    });

    $('#more-education-btn').on('click', function(e){
      e.preventDefault();
      $('#education-modal').modal('show');
    });

  });
</script>
@endpush