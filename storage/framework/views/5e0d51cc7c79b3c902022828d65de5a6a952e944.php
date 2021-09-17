 
 <?php $__env->startSection('main'); ?>
  <section id="explore">
    <div class="explore-top">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="jumbotron section-title">
                      <h1 class="display-4">Encontra oportunidades para alevancar a tua carreira</h1>
                      <p class="lead mb-2">Mais de 50 oportunidades diárias para você!.</p>
                      <a href="#" class="about-btn"><span>REGISTAR-SE</span> <i class="bx bx-chevron-right"></i></a>
                      <a href="#" class="about-btn"><span>FALA CONNOSCO</span> <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </div> 
    </div>
    <div class="container">
        <div class="row mt-5">
            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 mb-3 d-flex align-items-strech">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title "><?php echo e($job->title); ?></h5>
                    <small class=" mt-2 card-text ">
                        <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-secondary"><?php echo e($skill->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </small>
                    <p class="mt-2"><?php echo e($job->description); ?></p>
                  </div>
                  <div class="card-footer">
                    <a href="<?php echo e(route('job.show', [$job->id])); ?>" class="about-btn"><span>Saber mais</span> <i class="bx bx-chevron-right"></i></a> 
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
    </div>
  </section><!-- End Hero -->
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/job/explore.blade.php ENDPATH**/ ?>