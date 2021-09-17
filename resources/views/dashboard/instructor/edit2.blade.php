@extends('adminlte::page')
@push('css')
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/tagcloud/tagcloud.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/plugins/dropzone/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
<div class="bs-stepper">
  <div class="bs-stepper-header" role="tablist">
    <!-- your steps here -->
    <div class="step" data-target="#education-part">
      <button type="button" class="step-trigger" role="tab" aria-controls="education-part" id="education-part-trigger">
        <span class="bs-stepper-circle"><i class="fas fa-graduation-cap"></i></span>
        <span class="bs-stepper-label">Formação</span>
      </button>
    </div>
    <div class="bs-stepper-line"></div>
    <div class="step" data-target="#employment-part">
      <button type="button" class="step-trigger" role="tab" aria-controls="employment-part" id="employment-part-trigger">
        <span class="bs-stepper-circle"><i class="fas fa-briefcase"></i></span>
        <span class="bs-stepper-label">Trabalho</span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#skills-part">
      <button type="button" class="step-trigger" role="tab" aria-controls="skills-part" id="skills-part-trigger">
        <span class="bs-stepper-circle"><i class="fas fa-medal"></i></span>
        <span class="bs-stepper-label">Habilidade</span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#language-part">
      <button type="button" class="step-trigger" role="tab" aria-controls="language-part" id="language-part-trigger">
        <span class="bs-stepper-circle"><i class="fas fa-globe-africa"></i></span>
        <span class="bs-stepper-label">Idioma</span>
      </button>
    </div>
  </div>
  <div class="bs-stepper-content">
    <!-- your steps content here -->
    <form action="{{ route('instructor.update') }}" method="post">
      @csrf
      <input type="hidden" name="instructor_id" value="{{ Auth::guard('instructor')->user()->id }}">
      <div id="education-part" class="content fade" role="tabpanel" aria-labelledby="education-part-trigger">
        <h3>Adiciona as tuas formações</h3>
        
        @forelse($instructor->educations as $education)
        <button type="button" class="btn btn-outline-secondary m-2 btn-sm rounded-4">{{ $education->study_area }}</button>
        
        @empty
        <small>Você ainda não adicionou formação</small>
        @endforelse
        
        <br>
        <br>
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#education-modal"> Adicionar mais
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>

      <div id="employment-part" class="content fade" role="tabpanel" aria-labelledby="employment-part-trigger">
        <h3>Adiciona as tuas experiências de trabalho</h3>
        <p>Constroi a tua credibilidade mostrando os trabalhos que já tiveste.</p>
        @foreach($instructor->employments as $job)
        <button type="button" class="btn btn-outline-secondary m-2 btn-sm rounded-4">{{ $job->title }}</button>
        @endforeach
        
        @empty($instructor->employments)
        <small>Adiciona a tua primeira experiêcia de trabalho</small>
        @endempty
        <br>
        <br>
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#employment-modal">Mais experiência de trabalho </button>
        <br>
        <br>
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>
      
      <div id="skills-part" class="content fade" role="tabpanel" aria-labelledby="skills-part-trigger">
        <h3>Adiciona as tuas habilidades</h3>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control">
        </div>
        <select class="skill-cloud" name="skills[]" multiple>
          @foreach($skills as $skill)
            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
          @endforeach
        </select>

        <p>Constroi a tua credibilidade mostrando os trabalhos que já tiveste.</p>
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>
      
      <div id="language-part" class="content fade" role="tabpanel" aria-labelledby="language-part-trigger">
        <h3>Seleciona os idiomas que falas</h3>

        <select class="skill-cloud" name="languages[]" multiple>
          @foreach($languages as $language)
            <option value="{{ $language->id }}">{{ $language->name }}</option>
          @endforeach
        </select>
        <br>
        <br>
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
      </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
  </div>
</div>
@include('dashboard.instructor.modal.employment')
@include('dashboard.instructor.modal.education')
@include('dashboard.instructor.modal.language')
@endsection
@push('js')
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/tagcloud/tagcloud.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/dropzone/dropzone.min.js') }}"></script>
<script>
$(document).ready(function () {

  var stepper = new Stepper(document.querySelector('.bs-stepper'), {
    linear: false,
    animation: true
    });


  $('.nextstep').click(function(){
    stepper.next();
  });

  $('.previousstep').click(function(){
    stepper.previous();
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

  $.ajaxSetup({
    headers:{ 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') }
   });


  //////////  EMPLOYMENT MODAL SETUP
  $(function(){
      $('#employment_form').on('submit', function(e){
      e.preventDefault();
      var route = '/instructor/add-employment'
      var formValues = $('#employment_form').serialize();
      $.ajax({
        url: route,
        type: 'POST',
        data: formValues,
      })
      .done(function() {
        console.log("success");
        $('#close').click();
      })
      .fail(function(jqXHR) {
        console.log(jqXHR.status);
        console.log(jqXHR.responseText);
        //console.log(formValues);
      })
      .always(function() {
        console.log("complete");
      });
      
    });
  });


//////////  EDUCATION MODAL SETUP
 var form = new FormData($('#education_form'));
 form.append('file', $('input[type=file]')[0].files[0]);

$(function(){
    $('#education_form').on('submit', function(e){
    e.preventDefault();
    var route = '/instructor/add-education';
    var formValues = $('#education_form').serialize();
    $.ajax({
      url: route,
      //data: form,
      contentType: false,
      processData: false,
      type: 'POST',
      data: form,
    })
    .done(function() {
      console.log("success");
      $('#close').click();
    })
    .fail(function(jqXHR) {
      console.log(jqXHR.status);
      console.log(jqXHR.responseText);
      //console.log(formValues);
    })
    .always(function() {
      console.log("complete");
    });
    
  });
});


//////////  LANGUAGE MODAL SETUP
$(function(){
    $('#laguage_form').on('submit', function(e){
    e.preventDefault();
    var route = '/instructor/add-language';
    var formValues = $('#language_form').serialize();
    $.ajax({
      url: route,
      type: 'POST',
      data: formValues,
    })
    .done(function() {
      console.log("success");
      $('#close').click();
    })
    .fail(function(jqXHR) {
      console.log(jqXHR.status);
      console.log(jqXHR.responseText);
      //console.log(formValues);
    })
    .always(function() {
      console.log("complete");
    });
    
  });
});


  $('.skill-cloud').tagcloud();

  $('#education_form').on('submit', function(e){
    setTimeout(function(){
    location.reload();
      }, 100);
    });

  $('#employment_form').on('submit', function(e){
    setTimeout(function(){
    location.reload();
    }, 100);

  });

  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  // DROPZONE
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/instructor/add-education",
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews",
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  
});

</script>
@endpush