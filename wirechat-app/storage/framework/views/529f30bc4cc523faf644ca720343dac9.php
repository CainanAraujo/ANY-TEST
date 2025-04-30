<?php use \Namu\WireChat\Facades\WireChat; ?>
<div id="new-chat-modal ">

    <div 
    class="relative w-full h-96  border mx-auto  dark:border-gray-700 overflow-auto bg-white dark:bg-gray-800 dark:text-white px-7 sm:max-w-lg sm:rounded-lg">

    <header class=" sticky top-0 bg-white dark:bg-gray-800 z-10 py-2">
        <div class="flex justify-between items-center justify-between pb-2">

            <h3 class="text-lg font-semibold">New Chat</h3>

            <button
             dusk="close_modal_button"
             wire:click="$dispatch('closeModal')"
                class="p-2  text-gray-600 hover:dark:bg-gray-700 hover:dark:text-white rounded-full hover:text-gray-800 hover:bg-gray-50">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
        
        <section class="flex flex-wrap items-center px-0 border-b dark:border-gray-700">
            <input  dusk="search_users_field" autofocus type="search" id="users-search-field"
                wire:model.live.debounce='search' autocomplete="off"  placeholder="Search"
                class=" w-full border-0 w-auto px-0 dark:bg-gray-800 outline-none focus:outline-none bg-none rounded-lg focus:ring-0 hover:ring-0">

        </section>
    </header>

    <div class="relative w-full">

        
        <!--[if BLOCK]><![endif]--><?php if(WireChat::showNewGroupModalButton() && auth()->user()->canCreateGroups()): ?>
        <button
  
         wire:click="$dispatch('openChatDialog', {component: 'new-group'})"
         @dusk="open_new_group_modal_button"
         class="flex items-center gap-3 my-4  rounded-lg p-2 w-full border hover:border-gray-300 transition-colors  dark:border-gray-800 dark:hover:border-gray-700   "

         >
        <span        style=" color: var(--primary-color); " class="p-1 bg-gray-100  rounded-full ">

              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" w-5 h-5">
                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
              </svg>

        </span>

        <p class="dark:text-white">New group</p>
     </button>
     <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
        <section class="my-4">
            <!--[if BLOCK]><![endif]--><?php if($users): ?>

                <ul class="overflow-auto flex flex-col">

                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li wire:key="user-<?php echo e($key); ?>"
                            wire:click="createConversation('<?php echo e($user->id); ?>',<?php echo e(json_encode(get_class($user))); ?>)"
                            class="flex cursor-pointer group gap-2 items-center p-2">

                            <?php if (isset($component)) { $__componentOriginal573e53ccc82ae542bef1ba188da3d396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal573e53ccc82ae542bef1ba188da3d396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.avatar','data' => ['src' => ''.e($user->cover_url).'','class' => 'w-10 h-10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e($user->cover_url).'','class' => 'w-10 h-10']); ?>
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

                            <p class="group-hover:underline transition-all">
                                <?php echo e($user->display_name); ?></p>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


                </ul>
            

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </section>
    </div>
</div>
</div><?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/livewire/components/new-chat.blade.php ENDPATH**/ ?>