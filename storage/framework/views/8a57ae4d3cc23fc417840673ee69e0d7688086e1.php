<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/plugins/select2/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-dark">
        <h4 class="widget-user-username"><?php echo e(ucwords($job->title)); ?></h4>
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
          <form method="post" action="<?php echo e(route('admin.setInstructor')); ?>" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" value="<?php echo e($job->title); ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="start_date" class="col-sm-2 col-form-label">Data de Início</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="start_date" value="<?php echo e($job->start_date); ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">Data do Fim</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="end_date" value="<?php echo e($job->end_date); ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" value="<?php echo e($job->address); ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="rate" value="<?php echo e($job->rate); ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="skills" class="col-sm-2 col-form-label">Habilidades</label>
                <select class="select2 col-sm-10 form-control" multiple="multiple" id="skills">
                  <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(in_array($skill->id, $job->skills->pluck('id')->toArray())): ?>
                      <option value="<?php echo e($skill->id); ?>" selected>
                        <?php echo e($skill->name); ?>

                      </option>
                    <?php else: ?>
                      <option value="<?php echo e($skill->id); ?>">
                        <?php echo e($skill->name); ?>

                      </option>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                  <textarea readonly rows="5" style="width: 100%;"><?php echo e($job->description); ?></textarea>
              </div>
              </div>
              <div class="form-group row">
                <label for="instructor_id" class="col-sm-2 col-form-label">Instrutor</label>
                <select class="select2 col-sm-10 form-control" name="instructor_id"id="instructor_id">
                  <option value="wwwww"></option>
                  <?php $__currentLoopData = $job->applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(in_array($candidate->id, $job->applicants->pluck('id')->toArray())): ?>
                      <option value="<?php echo e($candidate->id); ?>" selected>
                        <?php echo e(ucwords($candidate->name)); ?>

                      </option>
                    <?php else: ?>
                      <option value="<?php echo e($candidate->id); ?>">
                        <?php echo e(ucwords($candidate->name)); ?>

                      </option>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <?php $__currentLoopData = $job->applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <img src="<?php echo e(asset('storage/img/instructors/' . $candidate->picture )); ?>" alt="<?php echo e($candidate->name); ?>" class="profile-user-img img-fluid img-circle" style="width: 35px; height: 35px;">
                  <?php echo e($candidate->name); ?>

                </td>
                <td><?php echo e($candidate->profession); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('vendor/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function($){
      $('.select2').select2();

      // make table row clickable
      $(".clickable-row").click(function() {
        window.location = $(this).data("href");
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/admin/job/show.blade.php ENDPATH**/ ?>