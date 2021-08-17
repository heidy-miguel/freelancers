      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              

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
    <form>
       
      <div id="education-part" class="content fade" role="tabpanel" aria-labelledby="education-part-trigger">
        <div class="form-group">
          <label for="school">Escola</label>
          <input type="text" class="form-control" id="school" name="school" placeholder="Escola, universidade, centro de formação">
        </div>
        <div class="form-group"> 
          <label for="exampleInputPassword1">Área de formação</label>
          <input type="text" class="form-control" name="stady_area" id="stady_area" placeholder="Banca, saúde, direito">
        </div>
        <div class="form-group"> 
          <label for="degree">Grau</label>
          <input type="text" class="form-control" name="degree" id="degree" placeholder="Mestrado, doutoramento, especialização, licenciatura, curso profissional">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6"> 
            <label for="start_date">Início</label>
            <input type="date" class="form-control" name="start_date" id="start_date">
          </div>
          <div class="form-group col-md-6"> 
            <label for="end_date">Fim</label>
            <input type="date" class="form-control" name="end_date" id="end_date">
          </div>
        </div>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>

      <div id="employment-part" class="content fade" role="tabpanel" aria-labelledby="employment-part-trigger">
        <div class="form-group"> 
          <label for="company">Empresa</label>
          <input type="text" class="form-control" name="company" placeholder="">
        </div>
        <div class="form-group"> 
          <label for="city">Província</label>
          <select class="form-control" name="city" id="city"></select>
        </div>
        <div class="form-group"> 
          <label for="title">Cargo</label>
          <select class="form-control" name="title" id="title"></select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6"> 
            <label for="start_date">Início</label>
            <input type="date" class="form-control" name="start_date" id="start_date">
          </div>
          <div class="form-group col-md-6"> 
            <label for="end_date">Fim</label>
            <input type="date" class="form-control" name="end_date" id="end_date">
          </div>
        </div>
        <div class="form-group"> 
          <label for="description">Descrição</label>
          <textarea  class="form-control" name="description" id="description"></textarea>
        </div>
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>

      </div>
      <div id="skills-part" class="content fade" role="tabpanel" aria-labelledby="skills-part-trigger">
        <button type="button" class="btn btn-primary previousstep">Anterior</button>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>
      <div id="language-part" class="content" role="tabpanel" aria-labelledby="language-part-trigger">
        <div class="form-group">
          <ul>
            @foreach(Auth::guard('instructor')->user()->languages as $lang)
              <li>{{ $lang->name }}</li>
            @endforeach
          </ul>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  More
                </button>

        </div>
        <button type="button" class="btn btn-primary nextstep pull-right">Próximo</button>
      </div>
    </form>
  </div>
</div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->