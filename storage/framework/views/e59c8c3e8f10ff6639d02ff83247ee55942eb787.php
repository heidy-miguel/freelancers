<?php $__env->startSection('content'); ?>

    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Solicitações Recentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Título</th>
                      <th>Cliente</th>
                      <th>Pagamento</th>
                      <th>Início</th>
                      <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="clickable-row" data-href="<?php echo e(route('admin.show-job', [$job->id])); ?>" role="button">
                      <td><?php echo e(ucwords($job->title)); ?></td>
                      <td><?php echo e(ucwords($job->trainee->name)); ?></td>
                      <td><?php echo e(number_format($job->rate, 2, ',', '.' )); ?> kz/hora</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo e(date('d-M-Y', strtotime($job->start_date))); ?></div>
                      </td>
                      <td>  
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo e($job->end_date); ?></div>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <div class="mx-auto">
                      <?php echo e($jobs->links('vendor.pagination.bootstrap-4')); ?>

                  </div>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
    $(document).ready(function($){
            // make table row clickable
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/admin/job/index.blade.php ENDPATH**/ ?>