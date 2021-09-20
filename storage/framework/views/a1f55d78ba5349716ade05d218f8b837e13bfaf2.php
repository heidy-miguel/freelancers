<?php ( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') ); ?>
<?php ( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') ); ?>

<?php if(config('adminlte.use_route_url', false)): ?>
    <?php ( $login_url = $login_url ? route($login_url) : '' ); ?>
    <?php ( $register_url = $register_url ? route($register_url) : '' ); ?>
<?php else: ?>
    <?php ( $login_url = $login_url ? url($login_url) : '' ); ?>
    <?php ( $register_url = $register_url ? url($register_url) : '' ); ?>
<?php endif; ?>

<?php $__env->startSection('auth_header', 'REGISTAR-SE COMO FREELANCER'); ?>

<?php $__env->startSection('auth_body'); ?>
    <form action="<?php echo e(route('instructor.create')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        
        <div class="input-group mb-3">
            <input type="text" name="first_name" class="form-control <?php echo e($errors->has('first_name') ? 'is-invalid' : ''); ?>"
                   value="<?php echo e(old('first_name')); ?>" placeholder="Nome" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                </div>
            </div>
            <?php if($errors->has('first_name')): ?>
                <div class="invalid-feedback">
                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="input-group mb-3">
            <input type="text" name="last_name" class="form-control <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>"
                   value="<?php echo e(old('last_name')); ?>" placeholder="Apelido" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                </div>
            </div>
            <?php if($errors->has('last_name')): ?>
                <div class="invalid-feedback">
                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                   value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('adminlte::adminlte.email')); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                </div>
            </div>
            <?php if($errors->has('email')): ?>
                <div class="invalid-feedback">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                   placeholder="<?php echo e(__('adminlte::adminlte.password')); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                </div>
            </div>
            <?php if($errors->has('password')): ?>
                <div class="invalid-feedback">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control <?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>"
                   placeholder="Repete a password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                </div>
            </div>
            <?php if($errors->has('password_confirmation')): ?>
                <div class="invalid-feedback">
                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </div>
            <?php endif; ?>
        </div>

        
        <button type="submit" class="btn btn-block <?php echo e(config('adminlte.classes_auth_btn', 'btn-flat btn-primary')); ?>">
            <span class="fas fa-user-plus"></span>
            <?php echo e(__('adminlte::adminlte.register')); ?>

        </button>


    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth_footer'); ?>
    <p class="my-0">
        <a href="<?php echo e(route('instructor.login')); ?>">
            Já me registei. Fazer login
        </a>
    </p>
    <p class="my-0">
        <a href="<?php echo e(route('trainee.register')); ?>">
            Registar-se como empresa
        </a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::auth.auth-page', ['auth_type' => 'register'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/instructor/register.blade.php ENDPATH**/ ?>