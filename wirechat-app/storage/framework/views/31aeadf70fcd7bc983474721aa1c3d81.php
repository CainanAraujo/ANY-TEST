<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'loadedMessages' => $loadedMessages,
    'receiver' => $receiver,
    'isGroup' => false,
    'isPrivate'=>$isPrivate,
    'authParticipant'=>$authParticipant,
    "conversation"
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
    'loadedMessages' => $loadedMessages,
    'receiver' => $receiver,
    'isGroup' => false,
    'isPrivate'=>$isPrivate,
    'authParticipant'=>$authParticipant,
    "conversation"
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<main x-data="{
    height: 0,
    previousHeight: 0,
    updateScrollPosition: function() {
        // Calculate the difference in height

        newHeight = document.getElementById('conversation').scrollHeight;

        
        heightDifference = newHeight - height;

        

        $el.scrollTop += heightDifference;
        // Update the previous height to the new height
        height = newHeight;

    }

    }"  
        x-init="
            requestAnimationFrame(() => {
                this.height = $el.scrollHeight;
                $el.scrollTop = this.height;
            });
        "
    @scroll ="
        scrollTop= $el.scrollTop;
        if((scrollTop<=0) && $wire.canLoadMore){

            $wire.loadMore();

        }
     "
    @update-height.window="

        requestAnimationFrame(() => {
            updateScrollPosition();
        });"
  
    id="conversation" x-ref="chatbox"
    x-cloak
    <?php echo e($attributes->merge(['class'=>'flex flex-col h-full relative gap-2 gap-y-4 p-4 md:p-5 lg:p-8  flex-grow  overscroll-contain overflow-x-hidden w-full my-auto'])); ?>

    style="contain: content" >



    <div x-cloak wire:loading.delay.class.remove="invisible" wire:target="loadMore" class="invisible transition-all duration-300 ">
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
 
    
    <?php
        $previousMessage = null;
    ?>

    <!--Message-->
    <!--[if BLOCK]><![endif]--><?php if($loadedMessages): ?>
        
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $loadedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $messageGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            
            <div  class="sticky top-0 uppercase p-2 shadow-sm px-2.5 z-[50] rounded-xl border border-gray-100/50 dark:border-slate-700/20 text-sm flex text-center justify-center  bg-gray-50  dark:bg-gray-800 dark:text-white  w-28 mx-auto ">
                <?php echo e($date); ?>

            </div>

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $messageGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php
                    $belongsToAuth = $message->belongsToAuth();
                    $parent = $message->parent ?? null;
                    $attachment = $message->attachment ?? null;
                    $isEmoji = mb_ereg('^(?:\X(?=\p{Emoji}))*\X$', $message->body ?? '');

                    // keep track of previous message
                    // The ($key -1 ) will get the previous message from loaded
                    // messages since $key is directly linked to $message
                    // dd($message);
                    if ($key > 0) {
                        $previousMessage = $messageGroup->get($key - 1);
                    }

                    // Get the next message
                    $nextMessage = $key < $messageGroup->count() - 1 ? $messageGroup->get($key + 1) : null;
                ?>


                <div class="flex gap-2" wire:key="message-<?php echo e($key); ?>"  >

                    
                    
                    <!--[if BLOCK]><![endif]--><?php if(!$belongsToAuth && !$isPrivate): ?>
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'shrink-0 mb-auto  -mb-2',
                            // Hide avatar if the next message is from the same user
                            'invisible' =>
                                $previousMessage &&
                                $message?->sendable?->is($previousMessage?->sendable),
                        ]); ?>">
                            <?php if (isset($component)) { $__componentOriginal573e53ccc82ae542bef1ba188da3d396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal573e53ccc82ae542bef1ba188da3d396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.avatar','data' => ['src' => ''.e($message->sendable?->cover_url ?? null).'','class' => 'h-8 w-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e($message->sendable?->cover_url ?? null).'','class' => 'h-8 w-8']); ?>
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
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <div class="w-[95%] mx-auto">
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'max-w-[85%] md:max-w-[78%]  flex flex-col gap-y-2  ',
                            'ml-auto' => $belongsToAuth]); ?>">



                            
                            <!--[if BLOCK]><![endif]--><?php if($parent != null): ?>
                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'max-w-fit   flex flex-col gap-y-2',
                                    'ml-auto' => $belongsToAuth,
                                    // 'ml-9 sm:ml-10' => !$belongsToAuth,
                                ]); ?>">



                                    <h6 class="text-xs text-gray-500 dark:text-gray-300 px-2 ">
                                        <?php echo e($message?->ownedBy(auth()->user()) ? 'You ' : $message->sendable?->display_name ?? 'User'); ?>

                                        replied to

                                        <?php echo e($parent?->ownedBy(auth()->user()) ? ($message?->ownedBy(auth()->user()) ? 'Yourself' : ' You'):($message?->ownedBy($parent->sendable) ? 'Themself' : $parent->sendable?->display_name)); ?>

                                    </h6>

                                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'px-1 dark:border-gray-500 overflow-hidden ',
                                        ' border-r-4 ml-auto' => $belongsToAuth,
                                        ' border-l-4 mr-auto ' => !$belongsToAuth,
                                    ]); ?>">
                                        <p
                                            class=" bg-gray-100 dark:text-white  dark:bg-gray-600 text-black line-clamp-1 text-sm  rounded-full max-w-fit   px-3 py-1 ">
                                            <?php echo e($parent?->body != '' ? $parent?->body : ($parent->hasAttachment() ? 'Attachment' : '')); ?>

                                        </p>
                                    </div>


                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->



                            
                            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'flex gap-1 md:gap-4 group transition-transform ',
                                'justify-end' => $belongsToAuth,
                            ]); ?>">

                                
                                <!--[if BLOCK]><![endif]--><?php if(($isGroup && $conversation->group?->allowsMembersToSendMessages()) || $authParticipant->isAdmin()): ?>
                                <div dusk="message_actions" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'my-auto flex  w-auto  items-center gap-2', 'order-1' => !$belongsToAuth, ]); ?>">
                                    
                                    <button wire:click="setReply('<?php echo e($message->id); ?>')"
                                        class=" invisible  group-hover:visible hover:scale-110 transition-transform">
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-reply-fill w-4 h-4 dark:text-white"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                        </svg>
                                    </button>
                                    
                                    <?php if (isset($component)) { $__componentOriginal196ddf7b585ec3523b268a7d918c7840 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal196ddf7b585ec3523b268a7d918c7840 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.dropdown','data' => ['class' => 'w-40','align' => ''.e($belongsToAuth ? 'right' : 'left').'','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-40','align' => ''.e($belongsToAuth ? 'right' : 'left').'','width' => '48']); ?>
                                         <?php $__env->slot('trigger', null, []); ?> 
                                            
                                            <button class="invisible  group-hover:visible hover:scale-110 transition-transform">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-three-dots h-3 w-3 text-gray-700 dark:text-white"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                                </svg>
                                            </button>
                                         <?php $__env->endSlot(); ?>
                                         <?php $__env->slot('content', null, []); ?> 

                                            <!--[if BLOCK]><![endif]--><?php if($message->ownedBy(auth()->user())|| ($authParticipant->isAdmin() && $isGroup)): ?>
                                                <button dusk="delete_message_for_everyone" wire:click="deleteForEveryone('<?php echo e($message->id); ?>')"
                                                    wire:confirm="Are you sure?" class="w-full text-start">
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
                                                        Delete for everyone
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


                                            
                                            <!--[if BLOCK]><![endif]--><?php if(!$isGroup): ?> 
                                            <button dusk="delete_message_for_me" wire:click="deleteForMe('<?php echo e($message->id); ?>')"
                                                wire:confirm="Are you sure?" class="w-full text-start">
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
                                                    Delete for me
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


                                            <button dusk="reply_to_message_button" wire:click="setReply('<?php echo e($message->id); ?>')"class="w-full text-start">
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
                                                    Reply
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
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                
                                <div class="flex flex-col gap-2 max-w-[95%]  relative">
                                    


                                    
                                    
                                    
                                    <!--[if BLOCK]><![endif]--><?php if($attachment): ?>
                                        <!--[if BLOCK]><![endif]--><?php if(!$belongsToAuth && $isGroup): ?>
                                            <div style="color:  var(--primary-color);" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'shrink-0 font-medium text-sm sm:text-base',
                                                // Hide avatar if the next message is from the same user
                                                'hidden' => $message?->sendable?->is($previousMessage?->sendable),
                                            ]); ?>">
                                                <?php echo e($message->sendable?->display_name); ?>

                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        
                                        <!--[if BLOCK]><![endif]--><?php if(str()->startsWith($attachment->mime_type, 'application/')): ?>
                                            <?php if (isset($component)) { $__componentOriginal4f21032071246cd0ea0601d07ee98bf5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f21032071246cd0ea0601d07ee98bf5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.file','data' => ['attachment' => $attachment]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attachment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attachment)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f21032071246cd0ea0601d07ee98bf5)): ?>
<?php $attributes = $__attributesOriginal4f21032071246cd0ea0601d07ee98bf5; ?>
<?php unset($__attributesOriginal4f21032071246cd0ea0601d07ee98bf5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f21032071246cd0ea0601d07ee98bf5)): ?>
<?php $component = $__componentOriginal4f21032071246cd0ea0601d07ee98bf5; ?>
<?php unset($__componentOriginal4f21032071246cd0ea0601d07ee98bf5); ?>
<?php endif; ?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        
                                        <?php if(str()->startsWith($attachment->mime_type, 'video/')): ?>
                                            <?php if (isset($component)) { $__componentOriginal2fb3ff642f530e68009996f2dc46d292 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fb3ff642f530e68009996f2dc46d292 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.video','data' => ['height' => 'max-h-[400px]','cover' => false,'source' => ''.e($attachment?->url).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.video'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'max-h-[400px]','cover' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'source' => ''.e($attachment?->url).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2fb3ff642f530e68009996f2dc46d292)): ?>
<?php $attributes = $__attributesOriginal2fb3ff642f530e68009996f2dc46d292; ?>
<?php unset($__attributesOriginal2fb3ff642f530e68009996f2dc46d292); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fb3ff642f530e68009996f2dc46d292)): ?>
<?php $component = $__componentOriginal2fb3ff642f530e68009996f2dc46d292; ?>
<?php unset($__componentOriginal2fb3ff642f530e68009996f2dc46d292); ?>
<?php endif; ?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        
                                        <?php if(str()->startsWith($attachment->mime_type, 'image/')): ?>
                                            <?php if (isset($component)) { $__componentOriginal1c13782814ec0b1db3f2cbedf170793a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c13782814ec0b1db3f2cbedf170793a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.image','data' => ['previousMessage' => $previousMessage,'message' => $message,'nextMessage' => $nextMessage,'belongsToAuth' => $belongsToAuth,'attachment' => $attachment]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['previousMessage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($previousMessage),'message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message),'nextMessage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nextMessage),'belongsToAuth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($belongsToAuth),'attachment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attachment)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c13782814ec0b1db3f2cbedf170793a)): ?>
<?php $attributes = $__attributesOriginal1c13782814ec0b1db3f2cbedf170793a; ?>
<?php unset($__attributesOriginal1c13782814ec0b1db3f2cbedf170793a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c13782814ec0b1db3f2cbedf170793a)): ?>
<?php $component = $__componentOriginal1c13782814ec0b1db3f2cbedf170793a; ?>
<?php unset($__componentOriginal1c13782814ec0b1db3f2cbedf170793a); ?>
<?php endif; ?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    
                                    <!--[if BLOCK]><![endif]--><?php if($isEmoji): ?>
                                        <p class="text-5xl dark:text-white ">
                                            <?php echo e($message->body); ?>

                                        </p>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    
                                    
                                    
                                    

                                    <!--[if BLOCK]><![endif]--><?php if($message->body && !$isEmoji): ?>
                                        <?php if (isset($component)) { $__componentOriginalce4aaf0d47c32467fe954ee208f2b290 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce4aaf0d47c32467fe954ee208f2b290 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.message','data' => ['previousMessage' => $previousMessage,'message' => $message,'nextMessage' => $nextMessage,'belongsToAuth' => $belongsToAuth,'isGroup' => $isGroup,'attachment' => $attachment]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['previousMessage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($previousMessage),'message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message),'nextMessage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nextMessage),'belongsToAuth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($belongsToAuth),'isGroup' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isGroup),'attachment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attachment)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce4aaf0d47c32467fe954ee208f2b290)): ?>
<?php $attributes = $__attributesOriginalce4aaf0d47c32467fe954ee208f2b290; ?>
<?php unset($__attributesOriginalce4aaf0d47c32467fe954ee208f2b290); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce4aaf0d47c32467fe954ee208f2b290)): ?>
<?php $component = $__componentOriginalce4aaf0d47c32467fe954ee208f2b290; ?>
<?php unset($__componentOriginalce4aaf0d47c32467fe954ee208f2b290); ?>
<?php endif; ?>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</main>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/chat/body.blade.php ENDPATH**/ ?>