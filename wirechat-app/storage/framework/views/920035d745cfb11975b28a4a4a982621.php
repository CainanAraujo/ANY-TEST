<?php use \Namu\WireChat\Facades\WireChat; ?>

<?php

    $primaryColor = WireChat::getColor();

?>

    <?php
        $__assetKey = '1150416650-0';

        ob_start();
    ?>
    <style>
        :root {
            --primary-color: <?php echo e($primaryColor); ?>

        }

        .custom-scrollbar {
            overflow-y: auto;
            /* Make sure the div is scrollable */

            scrollbar-width: 7px;

            &::-webkit-scrollbar {
                width: 8px;
                background-color: transparent;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 15px;
                visibility: hidden;
                background-color: #d1d5db;
            }

            /* Show scrollbar on hover */
            &:hover {
                &::-webkit-scrollbar-thumb {
                    visibility: visible;
                }
            }

            @media (prefers-color-scheme: dark) {
                &::-webkit-scrollbar-thumb {
                    background-color: #374151;
                }
            }

            &::-webkit-scrollbar-track {
                background-color: transparent;
            }



        }
    </style>
    <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;
            \Livewire\store($this)->push('assets', $__output, $__assetKey);
        }
    ?>


<div x-init=" setTimeout(() => {
     conversationElement = document.getElementById('conversation-<?php echo e($selectedConversationId); ?>');

     // Scroll to the conversation element
     if (conversationElement) {
         conversationElement.scrollIntoView({ behavior: 'smooth' });
     }
 }, 200);"
    class="flex flex-col bg-white/95 dark:bg-gray-900 transition-all h-full overflow-hidden w-full sm:p-3 border-r dark:border-gray-700  ">

    <?php
        $authUser = auth()->user();
        $authId = $authUser->id;
        $primaryColor = WireChat::getColor();

    ?>

    
    <?php if (isset($component)) { $__componentOriginal39e711243a3046f1b859aaf7d21fa99d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39e711243a3046f1b859aaf7d21fa99d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chats.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chats.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39e711243a3046f1b859aaf7d21fa99d)): ?>
<?php $attributes = $__attributesOriginal39e711243a3046f1b859aaf7d21fa99d; ?>
<?php unset($__attributesOriginal39e711243a3046f1b859aaf7d21fa99d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39e711243a3046f1b859aaf7d21fa99d)): ?>
<?php $component = $__componentOriginal39e711243a3046f1b859aaf7d21fa99d; ?>
<?php unset($__componentOriginal39e711243a3046f1b859aaf7d21fa99d); ?>
<?php endif; ?>


    <main x-data 
        @scroll.self.debounce="
    // Calculate scroll values
     scrollTop = $el.scrollTop;
     scrollHeight = $el.scrollHeight;
     clientHeight = $el.clientHeight;

    // Check if the user is at the bottom of the scrollable element
    if ((scrollTop + clientHeight) >= (scrollHeight - 1) && $wire.canLoadMore) {
        // Trigger load more if we're at the bottom
        await $nextTick();
        $wire.loadMore();
    }
    "
         
         class=" overflow-y-auto py-2   grow  h-full relative " style="contain:content">


        <!--[if BLOCK]><![endif]--><?php if(config('wirechat.allow_chats_search', false) == true): ?>
            <div x-cloak wire:loading.delay.class.remove="hidden"
                wire:target="search"class="hidden transition-all duration-300 ">
                <?php if (isset($component)) { $__componentOriginal4f6f2ea277c7202f49db6c32acb008a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.loading-spin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::loading-spin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2)): ?>
<?php $attributes = $__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2; ?>
<?php unset($__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f6f2ea277c7202f49db6c32acb008a2)): ?>
<?php $component = $__componentOriginal4f6f2ea277c7202f49db6c32acb008a2; ?>
<?php unset($__componentOriginal4f6f2ea277c7202f49db6c32acb008a2); ?>
<?php endif; ?>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if(count($conversations) > 0): ?>
            
            <ul wire:loading.delay.long.remove wire:target="search" class="p-2 grid w-full spacey-y-2">

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        //$receiver =$conversation->getReceiver();
                        $group = $conversation->isGroup() ? $conversation->group : null;
                        $receiver = $conversation->isGroup() ? null : $conversation->receiver?->participantable;
                        $lastMessage = $conversation->lastMessage;
                        //mark isReadByAuth true if user has chat opened 
                        $isReadByAuth = $conversation?->readBy(auth()?->user()) || $selectedConversationId ==$conversation->id;
                        $belongsToAuth = $lastMessage?->belongsToAuth();

                    ?>

                    

                    
                    
                    <li id="conversation-<?php echo e($conversation->id); ?>" wire:key="conversation-em-<?php echo e($conversation->id); ?>"
                        style="<?php echo \Illuminate\Support\Arr::toCssStyles([
                            'border-color:' . $primaryColor . '20' => $selectedConversationId == $conversation?->id,
                        ]) ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'py-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-sm transition-colors duration-150 flex gap-4 relative w-full cursor-pointer px-2',
                            'bg-gray-50 dark:bg-gray-800   border-r-4' =>
                                $selectedConversationId == $conversation?->id,
                        ]); ?>">

                        <a href="<?php echo e(route(WireChat::viewRouteName(), $conversation->id)); ?>" class="shrink-0">
                            <?php if (isset($component)) { $__componentOriginal573e53ccc82ae542bef1ba188da3d396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal573e53ccc82ae542bef1ba188da3d396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.avatar','data' => ['disappearing' => ''.e($conversation->hasDisappearingTurnedOn()).'','group' => ''.e($conversation->isGroup()).'','src' => ''.e($group ? $group?->cover_url : $receiver?->cover_url ?? null).'','class' => 'w-12 h-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disappearing' => ''.e($conversation->hasDisappearingTurnedOn()).'','group' => ''.e($conversation->isGroup()).'','src' => ''.e($group ? $group?->cover_url : $receiver?->cover_url ?? null).'','class' => 'w-12 h-12']); ?>
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
                        </a>

                        <aside class="grid  grid-cols-12 w-full">


                            <a wire:navigate href="<?php echo e(route(WireChat::viewRouteName(), $conversation->id)); ?>"
                                class="col-span-10 border-b pb-2 border-gray-100 dark:border-gray-700 relative overflow-hidden truncate leading-5 w-full flex-nowrap p-1">

                                
                                <div class="flex gap-1 mb-1 w-full items-center">
                                    <h6 class="truncate font-medium text-gray-900 dark:text-white">
                                        <?php echo e($group ? $group?->name : $receiver?->display_name); ?>

                                    </h6>

                                    <!--[if BLOCK]><![endif]--><?php if($conversation->isSelfConversation()): ?>
                                        <span class="font-medium dark:text-white">(You)</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </div>

                                
                                <!--[if BLOCK]><![endif]--><?php if($lastMessage != null): ?>
                                    <div class="flex gap-x-2 items-center">

                                        
                                        <!--[if BLOCK]><![endif]--><?php if($belongsToAuth): ?>
                                            <span class="font-bold text-xs dark:text-white/90 dark:font-normal">
                                                You:
                                            </span>
                                        <?php elseif(!$belongsToAuth && $group !== null): ?>
                                            <span class="font-bold text-xs dark:text-white/80 dark:font-normal">
                                                <?php echo e($lastMessage->sendable?->display_name); ?>:
                                            </span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'truncate text-sm dark:text-white  gap-2 items-center',
                                            'font-semibold text-black' =>
                                                !$isReadByAuth &&
                                                $lastMessage?->sendable_id != $authUser?->id &&
                                                $lastMessage?->sendable_type == get_class($authUser),
                                            'font-normal text-gray-600' =>
                                                $isReadByAuth &&
                                                $lastMessage?->sendable_id != $authUser?->id &&
                                                $lastMessage?->sendable_type == get_class($authUser),
                                            'font-normal text-gray-600' =>
                                                $isReadByAuth &&
                                                $lastMessage?->sendable_id == $authUser?->id &&
                                                $lastMessage?->sendable_type == get_class($authUser),
                                        ]); ?>">
                                            <?php echo e($lastMessage->body != '' ? $lastMessage->body : ($lastMessage->hasAttachment() ? '📎 Attachment' : '')); ?>

                                        </p>

                                    <span class="font-medium px-1 text-xs shrink-0 text-gray-800 dark:text-gray-50">
                                        <!--[if BLOCK]><![endif]--><?php if($lastMessage->created_at->diffInMinutes(now()) < 1): ?>
                                            now
                                        <?php else: ?>
                                            <?php echo e($lastMessage->created_at->shortAbsoluteDiffForHumans()); ?>

                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>


                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            </a>

                            
                            

                            
                            <!--[if BLOCK]><![endif]--><?php if($lastMessage != null && ($lastMessage?->sendable_id != $authUser?->id && $lastMessage?->sendable_type == get_class($authUser)) && !$isReadByAuth): ?>
                                
                            <div class=" col-span-2 flex flex-col text-center my-auto">
                                
                                <svg style="<?php echo \Illuminate\Support\Arr::toCssStyles(['color:' . $primaryColor]) ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-dot w-10 h-10 text-blue-500" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                </svg>

                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                        </aside>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </ul>

            
            <!--[if BLOCK]><![endif]--><?php if($canLoadMore): ?>
                <section wire:loading.remove wire:target="search" class="w-full justify-center flex my-3 ">
                    <button wire:loading.remove wire:target="loadMore" wire:loading.attr="disabled"
                        dusk="loadMoreButton" @click="$wire.loadMore()"
                        class="  text-sm dark:text-white disabled:hover:cursor-not-allowed hover:text-gray-700 transition-colors dark:hover:text-gray-500 dark:gray-200">
                        Load more
                    </button>

                    <div wire:loading wire:target="loadMore">
                        <?php if (isset($component)) { $__componentOriginal4f6f2ea277c7202f49db6c32acb008a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.loading-spin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::loading-spin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2)): ?>
<?php $attributes = $__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2; ?>
<?php unset($__attributesOriginal4f6f2ea277c7202f49db6c32acb008a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f6f2ea277c7202f49db6c32acb008a2)): ?>
<?php $component = $__componentOriginal4f6f2ea277c7202f49db6c32acb008a2; ?>
<?php unset($__componentOriginal4f6f2ea277c7202f49db6c32acb008a2); ?>
<?php endif; ?>
                    </div>
                </section>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <div class="w-full flex items-center h-full justify-center">
                <h6 class=" font-bold text-gray-700 dark:text-white">No conversations yet</h6>
            </div>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </main>



</div>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/livewire/chat/chats.blade.php ENDPATH**/ ?>