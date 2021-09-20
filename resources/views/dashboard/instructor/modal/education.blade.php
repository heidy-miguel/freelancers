<div class="modal fade" id="education-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Formação</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="education_form" action="<?= route('instructor.add_education') ?>" method="post"  enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="instructor_id" value="{{ Auth::guard('instructor')->user()->id }}">
          <div class="form-group"> 
            <label for="company">Curso</label>
            <input type="text" class="form-control" name="study_area" placeholder="Engenharia Informática, Económia, Finanças Públicas" required>
          </div>
          <div class="form-group"> 
            <label for="company">Instituição de ensino</label>
            <input type="text" class="form-control" name="school" placeholder="universidade, escola, centro de formação" required>
          </div>
          <div class="form-group"> 
            <label for="country">Grau</label>
            <select class="form-control" name="degree" required>
              <option>Curso</option>
              <option>Ensio Médio</option>
              <option>Licenciatura</option>
              <option>Mestrado</option>
              <option>Doutoramento</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> 
              <label for="start_date">Início</label>
              <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="form-group col-md-6"> 
              <label for="end_date">Fim</label>
              <input type="date" class="form-control" name="end_date" required>
            </div>
            <div class="form-group">
              <label for="file">Descrição</label>
              <textarea name="description" id="description" class="form-control" style="width: 100%" cols="60" required></textarea>
            </div>
            <div class="form-group">
              <label for="file">Certificado</label>
              <input type="file" name="file" id="file" except="pdf" class="form-control" style="width: 100%" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" id="submit" class="btn btn-primary" value="Save">
          </div>
        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
