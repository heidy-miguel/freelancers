
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-8 mx-auto pt-4">
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <h3 class="widget-user-username"><?php echo e($job->title); ?></h3>
                <h5 class="widget-user-desc"><?php echo e($job->trainee->name); ?></h5>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo e(date('d-M-Y', strtotime($job->start_date))); ?></h5>
                      <span class="description-text">Data Inicial</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo e(date('d-M-Y', strtotime($job->end_date))); ?></h5>
                      <span class="description-text">Data Final</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo e(number_format($job->rate, 2, ',', '.' )); ?></h5>
                      <span class="description-text">Pagamento</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="row">
                    <div class="description-block border-top p-3">
                      <h4>Descrição</h4>
                      <?php echo e($job->description); ?>

                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>  
  </div>
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/job/show.blade.php ENDPATH**/ ?>