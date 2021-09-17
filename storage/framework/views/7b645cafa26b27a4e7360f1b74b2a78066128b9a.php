<div class="modal fade" id="employment-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="employment_form" action="<?= route('instructor.add_employment') ?>" method="post" role="form">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="<?php echo e(Auth::guard('instructor')->user()->id); ?>">
          <div class="form-group"> 
            <label for="title">Cargo</label>
            <input type="text" class="form-control" name="title" placeholder="">
          </div>
          <div class="form-group"> 
            <label for="company">Empresa</label>
            <input type="text" class="form-control" name="company" placeholder="">
          </div>
          <div class="form-group"> 
            <label for="country">País</label>
            <select class="form-control" name="country" id="country"></select>
          </div>
          <div class="form-group"> 
            <label for="city">Província</label>
            <select class="form-control" name="city" id="city"></select>
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
<?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/instructor/modal/employment.blade.php ENDPATH**/ ?>