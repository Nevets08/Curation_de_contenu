<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($attributes->get('title')); ?> - <?php echo e(config('app.name', 'Caracara')); ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset(mix('css/appLogin.css'))); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset(mix('js/app.js'))); ?>" defer></script>
</head>

<body class="<?php echo e($attributes->get('title')); ?> lightTheme">
    <?php echo e($slot); ?>

</body>

</html>
<?php /**PATH /var/www/vhosts/bukal.etu.mmi-unistra.fr/laravel.bukal.etu.mmi-unistra.fr/Curation_de_contenu/caracara/resources/views/layouts/guest.blade.php ENDPATH**/ ?>