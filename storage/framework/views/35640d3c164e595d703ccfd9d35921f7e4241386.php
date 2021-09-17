<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/plugins/select2/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="width: 150px; height: 150px;" 
                       src="<?php echo e(asset('storage/img/instructors/' . $instructor->picture )); ?>"
                       alt="<?php echo e($instructor->name); ?>">
                </div>

                <h3 class="profile-username text-center"><?php echo e(ucwords($instructor->name)); ?></h3>

                <p class="text-muted text-center">
                  <?php echo e($instructor->profession); ?>

                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sobre mim</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Formação</strong>
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php $__currentLoopData = $instructor->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="item">
                        <div class="product-info" style="margin-left: 0px;">
                          <strong><?php echo e(ucwords($education->study_area)); ?></strong>
                          <span class="product-description">
                            <?php echo e(ucwords($education->degree)); ?> | <?php echo e(ucwords($education->school)); ?>

                          </span>
                        </div>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

                <p class="text-muted"><?php echo e($instructor->address); ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Habilidades</strong>

                <p class="text-muted">
                  <?php $__currentLoopData = $instructor->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="badge bg-dark"><?php echo e($skill->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Nota</strong>

                <p class="text-muted"><?php echo e($instructor->description); ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#employment" data-toggle="tab">Experiência Profissional</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Dados Pessoais</a></li>
                  <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Formação</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php if($errors->any()): ?>
                        <ul>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo e(asset('img/instructors/')); ?>/<?php echo e($instructor->picture); ?>" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="employment">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        <?php $__currentLoopData = $instructor->employments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div>

                        <i class="fas fa-envelope bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> <?php echo e($employment->start_date); ?> - <?php echo e($employment->end_date); ?></span>

                          <h3 class="timeline-header"><a href="#"><?php echo e($employment->title); ?></a>
                          <small> | <?php echo e($employment->company); ?> | </small></h3>

                          <div class="timeline-body">
                            <?php echo e($employment->description); ?>

                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-danger btn-sm">Read more</a>
                          </div>
                        </div>
                      </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!-- END timeline item -->

                      <div>
                            <a href="#" id="more-employment-btn" class="btn btn-danger btn-sm">Adicionar Mais</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="post" action="<?php echo e(route('instructor.update_personal_info')); ?>" enctype="multipart/form-data" class="form-horizontal" >
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('put'); ?>
                      <input type="hidden" name="instructor_id" value="<?php echo e($instructor->id); ?>">
                      <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo e(ucwords($instructor->first_name)); ?>" maxlength="150" placeholder="Nome">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="middle_name" class="col-sm-2 col-form-label">Seg. Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo e(ucwords($instructor->middle_name)); ?>" placeholder="Segundo Nome">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Apelido</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo e(ucwords($instructor->last_name)); ?>" placeholder="Apelido">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="profession" class="col-sm-2 col-form-label">Profissão</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="profession" id="profession" value="<?php echo e(ucwords($instructor->profession)); ?>" placeholder="Profissão">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo e(ucwords($instructor->phone)); ?>" placeholder="Telefone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo e($instructor->email); ?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" id="address" value="<?php echo e($instructor->address); ?>" placeholder="Endereço">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="skills" class="col-sm-2 col-form-label">Habilidades</label>
                        <div class="col-sm-10">
                          <select class="select2bs4" name="skills[]" multiple="multiple" style="width: 100%;" id="skills">
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
                      </div>
                      <div class="form-group row">
                        <label for="picture" class="col-sm-2 col-form-label">Fotografia</label>
                        <div class="col-sm-10">
                          <input type="file" name="picture" class="form-control" id="picture">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Nota</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="description" value="<?php echo e($instructor->description); ?>"><?php echo e($instructor->description); ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> Concordo com os <a href="#">termos e condições</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Salvar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="education">
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                        <?php $__currentLoopData = $instructor->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div>

                        <i class="fas fa-envelope bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> <?php echo e($education->start_date); ?> - <?php echo e($education->end_date); ?></span>

                          <h3 class="timeline-header"><a href="#"><?php echo e(ucwords($education->study_area)); ?></a>
                          <small> | <?php echo e(ucwords($education->school)); ?> </small></h3>

                          <div class="timeline-body">
                            <?php echo e($education->description); ?>

                          </div>
                          <div class="timeline-footer">
                      
                      <p>
                        <?php $__currentLoopData = $education->certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(asset('storage/docs/instructors/' . $certificate->name )); ?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> <?php echo e($certificate->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </p>
                          </div>
                        </div>
                      </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!-- END timeline item -->

                      <div>
                            <a href="#" id="more-education-btn" class="btn btn-danger btn-sm">Adicionar Mais</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
<?php echo $__env->make('dashboard.instructor.modal.employment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dashboard.instructor.modal.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dashboard.instructor.modal.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('vendor/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script>
  $(document).ready(function($) {
    $('.select2').select2();

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    var country_url = "<?php echo e(asset('countries.json')); ?>";
    $.getJSON(country_url, function(data) {
        $.each(data, function(index, val) {
          $('#country').append('<option>' + val.name + '</option>'); 
        });
    });

    var city_url = "<?php echo e(asset('city.json')); ?>";
    $.getJSON(city_url, function(data) {
        $.each(data, function(index, val) {
          $('#city').append('<option>' + val.name + '</option>'); 
        });
    });

    $('#more-employment-btn').on('click', function(e){
      e.preventDefault();
      $('#employment-modal').modal('show');
    });

    $('#more-education-btn').on('click', function(e){
      e.preventDefault();
      $('#education-modal').modal('show');
    });
    
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/instructor/edit.blade.php ENDPATH**/ ?>