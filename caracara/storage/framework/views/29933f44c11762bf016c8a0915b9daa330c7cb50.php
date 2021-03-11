 <?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <main>
        <img class="logo" src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo de notre site.">
        <h1>Connexion</h1>
        <form action="<?php echo e(route('login')); ?>" method="post">
             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.validation-errors','data' => []]); ?>
<?php $component->withName('jet-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php echo csrf_field(); ?>
            <label>Email
                <input type="email" id="email" name="email" :value="old('email')" required autofocus>
            </label>
            <label>Mot de passe
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </label>
            <label>
                <input style="width: auto" id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span>Se souvenir de moi</span>
            </label>

            <button type="submit">Se connecter</button>

            <?php if(Route::has('password.request')): ?>
                <a style="text-align: center; margin-top: 40px; color: #646464;" href="<?php echo e(route('password.request')); ?>">Mot de passe oublié ?</a>
            <?php endif; ?>

            <p style="text-align: center; margin-top: 0; color: #646464;">Pas encore inscrit ? <a style="color: #646464; text-decoration: underline" href="<?php echo e(route('register')); ?>">Inscrivez-vous</a></p>
        </form>
    </main>
 <?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH /var/www/vhosts/bukal.etu.mmi-unistra.fr/laravel.bukal.etu.mmi-unistra.fr/Curation_de_contenu/caracara/resources/views/auth/login.blade.php ENDPATH**/ ?>