
<?php use \Namu\WireChat\Helpers\Helper; ?>
<?php use \Namu\WireChat\Facades\WireChat; ?>

<?php

    $primaryColor = WireChat::getColor();

?>



    <?php
        $__assetKey = '1280107433-0';

        ob_start();
    ?>
    <style>
        :root {
            --primary-color: <?php echo e($primaryColor); ?>;
            --wirechat-primary-color: <?php echo e($primaryColor); ?>

        }


        emoji-picker {
            width: 100% !important;
            height: 100%;
        }

        /* Emoji picker configuration */
        emoji-picker {
            --background: #f9fafb;
            --border-radius: 12px;
            --input-border-color: rgb(229 229 229);
            --input-padding: 0.45rem;
            --outline-color: none;
            --outline-size: 1px;
            --num-columns: 8;
            /* Mobile-first default */
            --emoji-padding: 0.7rem;
            --emoji-size: 1.5rem;
            /* Smaller size for mobile */
            --border-color: none;
            --indicator-color: #9ca3af;
        }


        @media screen and (min-width: 600px) {
            emoji-picker {
                --num-columns: 10;
                /* Increase columns for larger screens */
                --emoji-size: 1.8rem;
                /* Larger size for desktop */
            }
        }

        @media screen and (min-width: 900px) {
            emoji-picker {
                --num-columns: 16;
                /* Increase columns for larger screens */
                --emoji-size: 1.9rem;
                /* Larger size for desktop */
            }
        }

        /* Emoji picker Dark mode configuration */
        @media (prefers-color-scheme: dark) {
            emoji-picker {
                --background: #1f2937;
                --input-border-color: #374151;
                --outline-color: none;
                --outline-size: 1px;
                --border-color: none;
                --input-font-color: white;
                --indicator-color: #9ca3af;
                --button-hover-background: #9ca3af
            }
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
                /* visibility: hidden; */
                background-color: #d1d5db;
            }

            /* Show scrollbar on hover */
            &:hover {
                &::-webkit-scrollbar-thumb {
                    /* visibility: visible; */
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

    <div x-data="{
        initializing: true,
        conversationElement: document.getElementById('conversation'),
        'loadEmojiPicker': function() {

            let script = document.createElement('script');
            script.type = 'module';
            script.src = 'https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js';
            script.defer = true;
            document.head.appendChild(script);
        }
    }" x-init="setTimeout(() => {
        $wire.dispatch('focus-input-field');
        requestAnimationFrame(() => {
          

            initializing = false;
        });

        }, 120);

        loadEmojiPicker();
    "
    @scroll-bottom.window="
        

            requestAnimationFrame(() => {
                
                conversationElement.style.overflowY='hidden';

                
                conversationElement.scrollTop = conversationElement.scrollHeight;

                
                   conversationElement.style.overflowY='auto';
            });
  
    "
    class=" w-full transition  bg-white/95 dark:bg-gray-900  overflow-hidden  h-full relative" style="contain:content">

    
    <div class=" flex flex-col  grow  h-full relative ">

        
        
        
        <?php if (isset($component)) { $__componentOriginal860c6f25c85412517e36bd6aa13357a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal860c6f25c85412517e36bd6aa13357a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.header','data' => ['receiver' => $receiver,'conversation' => $conversation]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['receiver' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($receiver),'conversation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($conversation)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal860c6f25c85412517e36bd6aa13357a3)): ?>
<?php $attributes = $__attributesOriginal860c6f25c85412517e36bd6aa13357a3; ?>
<?php unset($__attributesOriginal860c6f25c85412517e36bd6aa13357a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal860c6f25c85412517e36bd6aa13357a3)): ?>
<?php $component = $__componentOriginal860c6f25c85412517e36bd6aa13357a3; ?>
<?php unset($__componentOriginal860c6f25c85412517e36bd6aa13357a3); ?>
<?php endif; ?>


        
        
        


        <?php if (isset($component)) { $__componentOriginal01662a48fa311b6a213422c1df035273 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal01662a48fa311b6a213422c1df035273 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.body','data' => ['conversation' => $conversation,'authParticipant' => $authParticipant,'loadedMessages' => $loadedMessages,'isPrivate' => $conversation->isPrivate(),'isGroup' => $conversation->isGroup(),'receiver' => $receiver]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['conversation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($conversation),'authParticipant' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($authParticipant),'loadedMessages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loadedMessages),'isPrivate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($conversation->isPrivate()),'isGroup' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($conversation->isGroup()),'receiver' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($receiver)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal01662a48fa311b6a213422c1df035273)): ?>
<?php $attributes = $__attributesOriginal01662a48fa311b6a213422c1df035273; ?>
<?php unset($__attributesOriginal01662a48fa311b6a213422c1df035273); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01662a48fa311b6a213422c1df035273)): ?>
<?php $component = $__componentOriginal01662a48fa311b6a213422c1df035273; ?>
<?php unset($__componentOriginal01662a48fa311b6a213422c1df035273); ?>
<?php endif; ?>


        
        
        

        <footer class="shrink-0 h-auto relative   sticky bottom-0 mt-auto">

            <!--[if BLOCK]><![endif]--><?php if($conversation->isGroup() && !$conversation->group?->allowsMembersToSendMessages() && !$authParticipant->isAdmin()): ?>
                <div
                    class="bg-gray-50 w-full text-center text-gray-600 dark:text-gray-200 justify-center text-sm flex py-4 dark:bg-gray-800">

                    Only admins can send messages

                </div>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal1a6fc3501b240b1c9a5829480a6e3f5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a6fc3501b240b1c9a5829480a6e3f5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.footer','data' => ['media' => $media,'files' => $files,'replyMessage' => $replyMessage]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['media' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($media),'files' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($files),'replyMessage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($replyMessage)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a6fc3501b240b1c9a5829480a6e3f5f)): ?>
<?php $attributes = $__attributesOriginal1a6fc3501b240b1c9a5829480a6e3f5f; ?>
<?php unset($__attributesOriginal1a6fc3501b240b1c9a5829480a6e3f5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a6fc3501b240b1c9a5829480a6e3f5f)): ?>
<?php $component = $__componentOriginal1a6fc3501b240b1c9a5829480a6e3f5f; ?>
<?php unset($__componentOriginal1a6fc3501b240b1c9a5829480a6e3f5f); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </footer>

    </div>



    <?php if (isset($component)) { $__componentOriginal500de2b4782698a6e0c3c3e2db574db5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal500de2b4782698a6e0c3c3e2db574db5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.toast','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::toast'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal500de2b4782698a6e0c3c3e2db574db5)): ?>
<?php $attributes = $__attributesOriginal500de2b4782698a6e0c3c3e2db574db5; ?>
<?php unset($__attributesOriginal500de2b4782698a6e0c3c3e2db574db5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal500de2b4782698a6e0c3c3e2db574db5)): ?>
<?php $component = $__componentOriginal500de2b4782698a6e0c3c3e2db574db5; ?>
<?php unset($__componentOriginal500de2b4782698a6e0c3c3e2db574db5); ?>
<?php endif; ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('chat-drawer', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1280107433-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/livewire/chat/chat.blade.php ENDPATH**/ ?>