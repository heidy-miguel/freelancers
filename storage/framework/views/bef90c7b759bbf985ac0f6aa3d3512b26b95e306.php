<?php $__env->startSection('title', 'Formadores  | Freelancers Consulting'); ?>
<?php $__env->startSection('content'); ?>
    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Instrutores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Profissão</th>
                      <th>Contacto</th>
                      <th>Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="clickable-row" data-href="<?php echo e(route('admin.show-instructor', [$instructor->id])); ?>" role="button">
                      <td>
                        <img src="<?php echo e(asset('storage/img/instructors/' . $instructor->picture )); ?>" alt="<?php echo e(ucwords($instructor->name)); ?>" class="img-circle mr-2" style="width: 32px; height: 32px">
                        <?php echo e(ucwords($instructor->name)); ?>

                      </td>
                      <td><?php echo e(ucwords($instructor->profession)); ?></td>
                      <td><?php echo e($instructor->phone); ?></td>
                      <td><?php echo e(number_format($instructor->rate, 2, ',', '.' )); ?> kz/hora</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <div class="mx-auto">
                      <?php echo e($instructors->links('vendor.pagination.bootstrap-4')); ?>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/admin/instructor/index.blade.php ENDPATH**/ ?>