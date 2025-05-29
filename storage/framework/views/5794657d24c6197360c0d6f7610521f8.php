<?php $__env->startSection("title", "Регистрация"); ?>

<?php $__env->startSection("meta"); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php
$cspNonce = app('csp-nonce');
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style-form.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/style-notification.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<article>
	<header>
		<h2 class='h-2'>регистрация</h2>
	</header>

	<?php if(isset($errors)): ?>
	<?php if($errors->any()): ?>
	<div class="alert alert-danger" style="margin-bottom: 20px;">
		<ul style="list-style: none; padding: 0; margin: 0;">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li style="color: #dc3545; margin-bottom: 5px;"><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php endif; ?>

	<?php if(session('success')): ?>
	<div class="alert alert-success" style="margin-bottom: 20px;">
		<?php echo e(session('success')); ?>

	</div>
	<?php endif; ?>

	<form style="width: 515px;" id='register' data-alert='0' method='POST' action="<?php echo e(route('auth.register')); ?>">
		<?php echo csrf_field(); ?>

		<section>
			<label for="email" class="lbl-int">email</label>
			<input type="email" id="email" class="ipt-data <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
				placeholder="Введите email" name='email' autocomplete='email'
				value='<?php echo e(old('email')); ?>' required />
		</section>

		<section>
			<label for="username" class="lbl-int">имя пользователя</label>
			<input type="text" id="username" class="ipt-data <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
				placeholder="Введите логин" name='username' autocomplete='username'
				value="<?php echo e(old('username')); ?>" required />
		</section>

		<section>
			<label for="password" class="lbl-int">пароль</label>
			<input type="password" autocomplete='new-password' id="password" class="ipt-data <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
				placeholder="Введите пароль" name="password" required />
		</section>

		<section>
			<label for="password_confirmation" class="lbl-int">Повторите пароль</label>
			<input type="password" autocomplete='new-password' id="password_confirmation" class="ipt-data"
				placeholder="Введите пароль повторно" name="password_confirmation" required />
		</section>

		<button type='submit' class="btn-submit" style="letter-spacing: 1px;">зарегистрироваться</button>
	</form>

	<section class='centralize'>
		<div class='account-actions'><a class='without-decor' href="<?php echo e(route('auth.login-view')); ?>">Войти в аккаунт</a></div>
	</section>
</article>
<div class="notifications"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/notifications.js')); ?>" nonce='<?php echo e($cspNonce); ?>'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/auth/register.blade.php ENDPATH**/ ?>