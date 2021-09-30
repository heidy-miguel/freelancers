<div class="modal fade" id="solicitation-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nova Solicitação</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= route('institution.solicitate') ?>" method="post" role="form">
          @csrf
          <input type="hidden" name="institution_id" value="{{ Auth::guard('institution')->user()->id }}">
          <div class="form-group"> 
            <label for="title">Formação Pretendida</label>
            <input type="text" class="form-control" name="title" placeholder="Formador de Mecânica">
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
            <label for="description">Objectivos da Formação</label>
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
