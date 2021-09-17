<div class="modal fade" id="language-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Idioma</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="language_form" action="<?= route('instructor.add_language') ?>" method="post" role="form">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="instructor_id" value="<?php echo e(Auth::guard('instructor')->user()->id); ?>">
          <div class="form-group"> 
            <label for="country">Língua</label>
            <select class="form-control" name="language" id="language"></select>
          </div>
          <div class="form-group"> 
            <label for="country">Proeficiência</label>
            <select class="form-control" name="proficiency">
              <option>Materna</option>
              <option>Fluente</option>
              <option>Licenciatura</option>
              <option>Mestrado</option>
              <option>Doutoramento</option>
            </select>
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
<?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/instructor/modal/language.blade.php ENDPATH**/ ?>