<?php use \Namu\WireChat\Facades\WireChat; ?>

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'receiver' => $receiver,
    'conversation' => $conversation,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'receiver' => $receiver,
    'conversation' => $conversation,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $group = $conversation->group;
?>

<header
    class="w-full  sticky inset-x-0 flex pb-[5px] pt-[7px] top-0 z-10 bg-gray-50 dark:bg-gray-800 dark:border-gray-800/80  border-b">

    <div class="  flex  w-full items-center   px-2 py-2   lg:px-4 gap-2 md:gap-5 ">

        
        <a href="<?php echo e(route(WireChat::indexRouteName())); ?>" class=" shrink-0 lg:hidden  dark:text-white" id="chatReturn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </a>

        
        <section class="grid grid-cols-12 w-full">
            <div class="shrink-0 col-span-11 w-full truncate overflow-h-hidden relative">
                <div wire:click="$dispatch('openChatDrawer', {component: 'info',arguments: { conversation: <?php echo e($conversation->id); ?> }})"
                    class="flex items-center gap-2 cursor-pointer ">
                    <?php if (isset($component)) { $__componentOriginal573e53ccc82ae542bef1ba188da3d396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal573e53ccc82ae542bef1ba188da3d396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.avatar','data' => ['disappearing' => ''.e($conversation->hasDisappearingTurnedOn()).'','group' => ''.e($conversation->isGroup()).'','src' => ''.e($group ? $group?->cover_url : $receiver?->cover_url ?? null).'','class' => 'h-8 w-8 lg:w-10 lg:h-10 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disappearing' => ''.e($conversation->hasDisappearingTurnedOn()).'','group' => ''.e($conversation->isGroup()).'','src' => ''.e($group ? $group?->cover_url : $receiver?->cover_url ?? null).'','class' => 'h-8 w-8 lg:w-10 lg:h-10 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal573e53ccc82ae542bef1ba188da3d396)): ?>
<?php $attributes = $__attributesOriginal573e53ccc82ae542bef1ba188da3d396; ?>
<?php unset($__attributesOriginal573e53ccc82ae542bef1ba188da3d396); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal573e53ccc82ae542bef1ba188da3d396)): ?>
<?php $component = $__componentOriginal573e53ccc82ae542bef1ba188da3d396; ?>
<?php unset($__componentOriginal573e53ccc82ae542bef1ba188da3d396); ?>
<?php endif; ?>
                    <h6 class="font-bold text-base text-gray-800 dark:text-white w-full truncate">
                        <?php echo e($group ? $group?->name : $receiver?->display_name); ?> <!--[if BLOCK]><![endif]--><?php if($conversation->isSelfConversation()): ?>
                            (You)
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </h6>
                </div>

           
            </div>

            
            <div class="flex gap-2 items-center ml-auto col-span-1">
                <?php if (isset($component)) { $__componentOriginal196ddf7b585ec3523b268a7d918c7840 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal196ddf7b585ec3523b268a7d918c7840 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown','data' => ['align' => 'right','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button class="inline-flex px-0 text-gray-700 dark:text-gray-400">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.9" stroke="currentColor" class="size-6 w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>

                        </button>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 

                        <button
                            wire:click="$dispatch('openChatDrawer', {component: 'info',arguments: { conversation: <?php echo e($conversation->id); ?> }})"
                            class="w-full text-start">

                            <?php if (isset($component)) { $__componentOriginal3bfabb932fb809864c5e7452331bbd6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php echo e($conversation->isGroup() ? 'Group' : 'Chat'); ?> Info
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $attributes = $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $component = $__componentOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>

                        </button>


                        <?php if (isset($component)) { $__componentOriginal3bfabb932fb809864c5e7452331bbd6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown-link','data' => ['href' => ''.e(route(WireChat::indexRouteName())).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route(WireChat::indexRouteName())).'']); ?>
                            Close Chat
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $attributes = $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $component = $__componentOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>


                    
                    <!--[if BLOCK]><![endif]--><?php if(!$conversation->isGroup()): ?>
                    <button class="w-full" wire:click="clearConversation"
                        wire:confirm="Are you sure you want to clear this Chat History ?">

                        <?php if (isset($component)) { $__componentOriginal3bfabb932fb809864c5e7452331bbd6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Clear Chat History
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $attributes = $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $component = $__componentOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
                    </button>

                    <button wire:click="deleteConversation"
                        wire:confirm="Are you sure delete <?php echo e($conversation->isGroup() ? 'Group' : 'Chat'); ?>"
                        class="w-full text-start">

                        <?php if (isset($component)) { $__componentOriginal3bfabb932fb809864c5e7452331bbd6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown-link','data' => ['class' => 'text-red-500 dark:text-red-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 dark:text-red-500']); ?>
                            Delete Chat
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $attributes = $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $component = $__componentOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>

                    </button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                    <!--[if BLOCK]><![endif]--><?php if($conversation->isGroup() && !auth()->user()->isOwnerOf($conversation)): ?>
                            <button wire:click="exitConversation" wire:confirm="Are you sure want to exit Group?"
                                class="w-full text-start ">

                                <?php if (isset($component)) { $__componentOriginal3bfabb932fb809864c5e7452331bbd6f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown-link','data' => ['class' => 'text-red-500 dark:text-gray-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 dark:text-gray-500']); ?>
                                    Exit Group
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $attributes = $__attributesOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__attributesOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f)): ?>
<?php $component = $__componentOriginal3bfabb932fb809864c5e7452331bbd6f; ?>
<?php unset($__componentOriginal3bfabb932fb809864c5e7452331bbd6f); ?>
<?php endif; ?>

                            </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal196ddf7b585ec3523b268a7d918c7840)): ?>
<?php $attributes = $__attributesOriginal196ddf7b585ec3523b268a7d918c7840; ?>
<?php unset($__attributesOriginal196ddf7b585ec3523b268a7d918c7840); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal196ddf7b585ec3523b268a7d918c7840)): ?>
<?php $component = $__componentOriginal196ddf7b585ec3523b268a7d918c7840; ?>
<?php unset($__componentOriginal196ddf7b585ec3523b268a7d918c7840); ?>
<?php endif; ?>

            </div>
        </section>


    </div>

</header>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/chat/header.blade.php ENDPATH**/ ?>