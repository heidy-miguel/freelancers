@extends('adminlte::page')
@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-dark">
        <h4 class="widget-user-username">{{ ucwords($job->title) }}</h4>
      </div>

      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">3,200</h5>
              <span class="description-text">SALES</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
              <span class="description-text">FOLLOWERS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">345</h5>
              <span class="description-text">Trabalhos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

<div class="col-12 col-md-8 mx-auto">
  <div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Informação Geral</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Cadidatos</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-three-tabContent">
        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
          <form method="post" action="{{ route('admin.setInstructor') }}" class="form-horizontal">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" value="{{ $job->title }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="start_date" class="col-sm-2 col-form-label">Data de Início</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="start_date" value="{{ $job->start_date}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">Data do Fim</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="end_date" value="{{ $job->end_date}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" value="{{ $job->address}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="rate" value="{{ $job->rate }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="skills" class="col-sm-2 col-form-label">Habilidades</label>
                <select class="select2 col-sm-10 form-control" multiple="multiple" id="skills">
                  @foreach($skills as $skill)
                    @if(in_array($skill->id, $job->skills->pluck('id')->toArray()))
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
              <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                  <textarea readonly rows="5" style="width: 100%;">{{ $job->description}}</textarea>
              </div>
              </div>
              <div class="form-group row">
                <label for="instructor_id" class="col-sm-2 col-form-label">Instrutor</label>
                <select class="select2 col-sm-10 form-control" name="instructor_id"id="instructor_id">
                  <option value="wwwww"></option>
                  @foreach($job->applicants  as $candidate)
                    @if(in_array($candidate->id, $job->applicants->pluck('id')->toArray()))
                      <option value="{{ $candidate->id }}" selected>
                        {{ ucwords($candidate->name) }}
                      </option>
                    @else
                      <option value="{{ $candidate->id }}">
                        {{ ucwords($candidate->name) }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info float-right">salvar</button>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
          <table class="table table-striped table-valign-middle"> 
            <thead>
            <tr>
              <th>Nome</th>
              <th>Profissão</th>
            </tr>
            </thead>
            <tbody>
              @foreach($job->applicants as $candidate)
              <tr>
                <td>
                  <img src="{{ asset('storage/img/instructors/' . $candidate->picture ) }}" alt="{{ $candidate->name }}" class="profile-user-img img-fluid img-circle" style="width: 35px; height: 35px;">
                  {{ $candidate->name }}
                </td>
                <td>{{ $candidate->profession }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function($){
      $('.select2').select2();

      // make table row clickable
      $(".clickable-row").click(function() {
        window.location = $(this).data("href");
        });
    });
</script>
@endpush