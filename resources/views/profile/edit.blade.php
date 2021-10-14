@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello,') . ' '. ucwords(auth()->user()->name),
        'description' => __('Esta é a sua página de perfil. Você pode ver o progresso que fez com seu trabalho e gerenciar seus projetos ou tarefas atribuídas'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
<!--                             <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> -->
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">{{ auth()->user()->total_apps() }}</span>
                                        @if(auth()->user()->is_institution())
                                        <span class="description">Solicitações Feitas</span>
                                        @endif
                                        @if(auth()->user()->is_manager())
                                        <span class="description">Solicitações Atribuidas</span>
                                        @endif
                                    </div>
<!--                                     <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ ucwords(auth()->user()->name) }}  
                                {{ ucwords(auth()->user()->surname) }} 
                                <!--<span class="font-weight-light">, 27</span>-->
                            </h3>
                            @if(isset(auth()->user()->address))
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ auth()->user()->address }}
                            </div>
                            @endif
                            @if(isset(auth()->user()->profession))
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->profession }}
                            </div>
                            @endif

                            <hr class="my-4" />
                            <p>
                                <a href="{{ asset('storage') }}/{{ auth()->user()->cv }}">Currículo</a>
                            </p>
                            <hr class="my-4" />
                            <p>
                                <a href="{{ asset('storage') }}/{{ auth()->user()->cap }}">CAP</a>
                            </p>
                            <p>{{ auth()->user()->description }}</p>
                            <!-- <a href="#">{{ __('Show more') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-8 order-xl-1">


                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Perfil</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Minhas Solicitações</a>
                        </li>
                    </ul>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <h6 class="heading-small text-muted mb-4">{{ __('Informação do Usuário') }}</h6>
                                            
                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('status') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif


                                            <div class="pl-lg-4">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                @role('institution')
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-nif">{{ __('NIF') }}</label>
                                                    <input type="text" name="nif" id="input-nif" class="form-control form-control-alternative{{ $errors->has('nif') ? ' is-invalid' : '' }}" placeholder="{{ __('Número de Identificação FIscal') }}" value="{{ old('nif', auth()->user()->nif) }}" required>

                                                    @if ($errors->has('nif'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nif') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @endrole


                                                @role('trainer')
                                                <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-surname">{{ __('Apelido') }}</label>
                                                    <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Apelido') }}" value="{{ old('surname', auth()->user()->surname) }}" required autofocus>

                                                    @if ($errors->has('surname'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('surname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-profession">{{ __('Profissão') }}</label>
                                                    <input type="text" name="profession" id="input-profession" class="form-control form-control-alternative{{ $errors->has('profession') ? ' is-invalid' : '' }}" placeholder="{{ __('Profissão') }}" value="{{ old('profession', auth()->user()->profession) }}" required autofocus>

                                                    @if ($errors->has('profession'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('profession') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @endrole

                                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-phone">{{ __('Telefone') }}</label>
                                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" value="{{ old('phone', auth()->user()->phone) }}" required autofocus>

                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-address">{{ __('Endereço') }}</label>
                                                    <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço') }}" value="{{ old('address', auth()->user()->address) }}">

                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>



                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @if(auth()->user()->is_trainer())
                                               <div class="form-group{{ $errors->has('cv') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-email">{{ __('Curriculum Vitae') }}</label>
                                                    <input type="file" name="cv" id="cv" class="form-control form-control-alternative{{ $errors->has('cv') ? ' is-invalid' : '' }}" placeholder="{{ __('Curriculum') }}">

                                                    @if ($errors->has('cv'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('cv') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                               <div class="form-group{{ $errors->has('cap') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="cap">{{ __('Certificado de Formador') }}</label>
                                                    <input type="file" name="cap" id="cap" class="form-control form-control-alternative{{ $errors->has('cap') ? ' is-invalid' : '' }}" placeholder="{{ __('Certificado de Formador') }}">

                                                    @if ($errors->has('cap'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('cap') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                @endif
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr class="my-4" />
                                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                                            @csrf
                                            @method('put')

                                            <h6 class="heading-small text-muted mb-4">{{ __('Palavra-passe') }}</h6>

                                            @if (session('password_status'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('password_status') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif

                                            <div class="pl-lg-4">
                                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-current-password">{{ __('Palavra-passe Actual') }}</label>
                                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Palavra-passe Actual') }}" value="" required>
                                                    
                                                    @if ($errors->has('old_password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('old_password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-password">{{ __('Nova Palavra-passe') }}</label>
                                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nova Palavra-passe') }}" value="" required>
                                                    
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirma a Nova Palavra-passe') }}</label>
                                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Nova Palavra-passe') }}" value="" required>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                                </div>
                                            </div>
                                        </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Formação Pretendida</th>
                    <th scope="col" class="sort" data-sort="name">Categoria</th>
                    <th scope="col" class="sort" data-sort="budget">Data de Início</th>
                    <th scope="col" class="sort" data-sort="status">Data Final</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                @if(auth()->user()->is_institution())
                @foreach(auth()->user()->applications as $app)
                <tr>
                    <td>{{ ucwords($app->title) }}</td>
                    <td>{{ ucwords($app->category->name) }}</td>
                    <td>{{ date('d-M-Y', strtotime($app->start_date)) }}</td>
                    <td>{{ date('d-M-Y', strtotime($app->end_date)) }}</td>
                    
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="{{ route('application.edit', [$app->id]) }}">Editar</a>
                          <a class="dropdown-item" href="#">Arquivar</a>
                        </div>
                      </div>
                    </td>
                </tr>
                @endforeach
                @endif

                @if(auth()->user()->is_manager())
                @foreach(auth()->user()->managed_by_me as $app)
                <tr>
                    <td>{{ ucwords($app->title) }}</td>
                    <td>{{ ucwords($app->category->name) }}</td>
                    <td>{{ date('d-M-Y', strtotime($app->start_date)) }}</td>
                    <td>{{ date('d-M-Y', strtotime($app->end_date)) }}</td>
                    
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="{{ route('application.edit', [$app->id]) }}">Editar</a>
                          <a class="dropdown-item" href="#">Arquivar</a>
                        </div>
                      </div>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
              </table>
              <br>
              <br>
              <br>
              <br>
              <br>
            </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>

       
        @include('layouts.footers.auth')
    </div>
@endsection
