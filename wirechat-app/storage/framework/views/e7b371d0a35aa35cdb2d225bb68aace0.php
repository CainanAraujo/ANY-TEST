<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? config('app.name', 'Laravel')); ?></title>

      <!-- JavaScript to prevent flickering -->
      <script>
        // Function to apply or remove the dark theme
        function updateTheme(isDark) {
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    
        // Check the initial theme preference
        const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        updateTheme(darkModeMediaQuery.matches);
    
        // Listen for changes in the theme preference
        darkModeMediaQuery.addEventListener('change', (event) => {
            updateTheme(event.matches);
        });
      </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
   

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Define root properties */
    </style>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white dark:bg-gray-900">

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>

    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php if (! $__env->hasRenderedOnce('d7f4728b-962c-4d18-92dc-f0c2b9bdd9a6')): $__env->markAsRenderedOnce('d7f4728b-962c-4d18-92dc-f0c2b9bdd9a6'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('chat-dialog');

$__html = app('livewire')->mount($__name, $__params, 'lw-4035307000-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
   <?php endif; ?>
</body>

</html>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/layouts/app.blade.php ENDPATH**/ ?>