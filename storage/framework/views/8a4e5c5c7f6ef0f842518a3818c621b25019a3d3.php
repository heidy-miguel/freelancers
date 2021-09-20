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
        <h3 class="widget-user-username"><?php echo e(ucwords($instructor->fullName)); ?></h3>
        <h5 class="widget-user-desc"><?php echo e(ucwords($instructor->profession)); ?></h5>
      </div>
      <div class="widget-user-image"> 
        <img class="img-circle elevation-2" src="<?php echo e(asset('storage/img/instructors/' . $instructor->picture )); ?>" style="width: 100px; height: 100px" alt="<?php echo e(ucwords($instructor->name)); ?>">
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
              <h5 class="description-header"><?php echo e($total_jobs); ?></h5>
              <span class="description-text">Trabalhos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
      <div class="card card-dark card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-education-tab" data-toggle="pill" href="#custom-tabs-one-education" role="tab" aria-controls="custom-tabs-one-education" aria-selected="false">Formação</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form method="post" action="" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="instructor_id" value="<?php echo e($instructor->id); ?>">
                  <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" value="<?php echo e($instructor->first_name); ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="middle_name" class="col-sm-2 col-form-label">Segundo Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="middle_name" value="<?php echo e($instructor->middle_name); ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="last_name" class="col-sm-2 col-form-label">Apelido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" value="<?php echo e($instructor->last_name); ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="address" value="<?php echo e($instructor->address); ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="rate" value="<?php echo e($instructor->rate); ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="skills" class="col-sm-2 col-form-label">Habilidades</label>
                    <select class="select2 col-sm-10 form-control" multiple="multiple" id="skills">
                      <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($skill->id, $instructor->skills->pluck('id')->toArray())): ?>
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
                      <textarea readonly rows="5" style="width: 100%;"><?php echo e($instructor->description); ?></textarea>
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark float-right">Sign in</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-education" role="tabpanel" aria-labelledby="custom-tabs-one-education-tab">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php $__currentLoopData = $instructor->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li css="item">
                    <div class="product-info">
                      <h6 href="javascript:void(0)" class="product-title"><?php echo e(ucwords($education->study_area)); ?> 
                        <span class="float-right"><?php echo e($education->start_date); ?> - <?php echo e($education->end_date); ?></span></h6>
                      <span class="product-description">
                        <?php echo e($education->school); ?> | 
                      </span>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
               Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/admin/instructor/show.blade.php ENDPATH**/ ?>