<div class="modal fade" id="job-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nova Solicitação</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="job_form" action="<?= route('trainee.add_job') ?>" method="post" role="form">
          @csrf
          <input type="hidden" name="trainee_id" value="{{ Auth::guard('trainee')->user()->id }}">
          <div class="form-group"> 
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" placeholder="Formador de Mecânica">
          </div>
          <div class="form-group"> 
            <label for="address">Endereço</label>
            <input type="text" class="form-control" name="address" placeholder="">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> 
              <label for="start_date">Data de Início</label>
              <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="form-group col-md-6"> 
              <label for="end_date">Data do Fim</label>
              <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
          </div>
          <div class="form-group"> 
            <label for="rate">Pagamento</label>
            <input type="text"  class="form-control" name="rate" id="rate">
          </div>
          <div class="form-group"> 
            <label for="description">Descrição</label>
            <textarea  class="form-control" name="description" id="description"></textarea>
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
