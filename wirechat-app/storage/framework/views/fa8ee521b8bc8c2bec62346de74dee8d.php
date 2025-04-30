
<?php use \Namu\WireChat\Helpers\Helper; ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['media','files','replyMessage','','']));

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

foreach (array_filter((['media','files','replyMessage','','']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div id="chat-footer" x-data="{ 'openEmojiPicker': false }"
    class=" px-3 md:px-1 border-t shadow   dark:bg-gray-800 bg-gray-50 z-[50]    dark:border-gray-800/80  flex flex-col gap-3 items-center  w-full   mx-auto">

    
    <section x-cloak x-show="openEmojiPicker" x-transition:enter="transition  ease-out duration-180 transform"
        x-transition:enter-start=" translate-y-full" x-transition:enter-end=" translate-y-0"
        x-transition:leave="transition ease-in duration-180 transform" x-transition:leave-start=" translate-y-0"
        x-transition:leave-end="translate-y-full"
        class="w-full flex hidden sm:flex   py-2 sm:px-4 py-1.5 border-b dark:border-gray-700  h-96 min-w-full">

        <emoji-picker dusk="emoji-picker" style="width: 100%" class=" flex w-full h-full rounded-xl"></emoji-picker>
    </section>
    
    <section
        class=" py-2 sm:px-4 py-1.5    z-[50]  bg-gray-50 dark:bg-gray-800   flex flex-col gap-3 items-center  w-full mx-auto">

        
        <section 
        x-show="$wire.media.length>0 ||$wire.files.length>0"
        x-cloak

        class="  flex flex-col w-full gap-3"
        wire:loading.class="animate-pulse"
        wire:target="sendMessage"
        >

       

        <!--[if BLOCK]><![endif]--><?php if(count($media) > 0): ?>
        <div  x-data="attachments('media')">
          
           
           
            
            <section
                
                class=" flex  overflow-x-scroll  ms-overflow-style-none items-center w-full col-span-12 py-2 gap-5 "
                style=" scrollbar-width: none; -ms-overflow-style: none;">


                
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mediaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if(str()->startsWith($mediaItem->getMimeType(), 'image/')): ?>
                        <div class="relative h-24 sm:h-36 aspect-[4/3] ">
                            
                            <button wire:loading.attr="disabled" class="disabled:cursor-progress absolute -top-2 -right-2  z-10 dark:text-gray-50"
                                @click="removeUpload('<?php echo e($mediaItem->getFilename()); ?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                            <img class="h-full w-full  rounded-lg object-scale-down" src="<?php echo e($mediaItem->temporaryUrl()); ?>"
                                alt="mediaItem">

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <?php if(str()->startsWith($mediaItem->getMimeType(), 'video/')): ?>
                        <div class="relative h-24 sm:h-36 ">
                            <button wire:loading.attr="disabled" class="disabled:cursor-progress absolute -top-2 -right-2  z-10 dark:text-gray-50"
                                @click="removeUpload('<?php echo e($mediaItem->getFilename()); ?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                            <?php if (isset($component)) { $__componentOriginal2fb3ff642f530e68009996f2dc46d292 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fb3ff642f530e68009996f2dc46d292 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.chat.video','data' => ['height' => 'h-24 sm:h-36 ','cover' => false,'showToggleSound' => false,'source' => $mediaItem->temporaryUrl()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::chat.video'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['height' => 'h-24 sm:h-36 ','cover' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'showToggleSound' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'source' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mediaItem->temporaryUrl())]); ?>
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
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                

                 
                <label
                    wire:loading.class="cursor-progress" 
                    class="shrink-0 cursor-pointer relative w-16 h-14 rounded-lg bg-gray-100 dark:bg-gray-700 flex text-center justify-center border dark:border-gray-700 border-gray-50">
                    <input 
                    wire:loading.attr="disabled"
                    @change="handleFileSelect(event,<?php echo e(count($media)); ?>)" type="file" multiple
                        accept="<?php echo e(Helper::formattedMediaMimesForAcceptAttribute()); ?>" class="sr-only">
                    <span class="m-auto ">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-7 h-7 text-gray-600 dark:text-gray-100">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>

                    </span>
                </label>

            </section>
        </div>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        
        
        <!--[if BLOCK]><![endif]--><?php if(count($files) > 0): ?>
            <section x-data="attachments('files')"
                class="flex  overflow-x-scroll  ms-overflow-style-none items-center w-full col-span-12 py-2 gap-5 "
                style=" scrollbar-width: none; -ms-overflow-style: none;">

                
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative shrink-0">
                        
                        <button wire:loading.attr="disabled" class="disabled:cursor-progress absolute -top-2 -right-2  z-10"
                            @click="removeUpload('<?php echo e($file->getFilename()); ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-circle dark:text-white dark:hover:text-red-500 hover:text-red-500 transition-colors"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </button>

                        
                        <div class="flex items-center group overflow-hidden border dark:border-gray-600 rounded-xl">
                            <span class=" p-2">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-8 h-8 text-gray-500 dark:text-gray-100">
                                    <path
                                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625Z" />
                                    <path
                                        d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                </svg>
                            </span>

                            <p class="mt-auto  p-2 text-gray-600 dark:text-gray-100 text-sm">
                                <?php echo e($file->getClientOriginalName()); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                
                
                <label
                    wire:loading.class="cursor-progress" 
                    class="cursor-pointer shrink-0 relative w-16 h-14 rounded-lg bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 transition-colors   flex text-center justify-center border dark:border-gray-800 border-gray-50">
                    <input 
                        wire:loading.attr="disabled"
                        @change="handleFileSelect(event,<?php echo e(count($files)); ?>)" type="file" multiple
                        accept="<?php echo e(Helper::formattedFileMimesForAcceptAttribute()); ?>" class="sr-only" hidden>
                        <span class="  m-auto">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 dark:text-gray-50">
                            <path fill-rule="evenodd"
                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                clip-rule="evenodd" />
                        </svg>


                    </span>
                </label>

            </section>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </section>


        
        <!--[if BLOCK]><![endif]--><?php if($replyMessage != null): ?>
            <section class="p-px py-1 w-full col-span-12">
                <div class="flex justify-between items-center dark:text-white">
                    <h6 class="text-sm">Replying to
                        <span class="font-bold">
                            <?php echo e($replyMessage?->ownedBy(auth()->user()) ? ' Yourself' : $replyMessage->sendable?->name); ?>

                        </span>
                    </h6>
                    <button  wire:loading.attr="disabled"  wire:click="removeReply()" class="disabled:cursor-progress">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                
                <p class="truncate text-sm text-gray-500 dark:text-gray-200 max-w-md">
                    <?php echo e($replyMessage->body != '' ? $replyMessage->body : ($replyMessage->hasAttachment() ? 'Attachment' : '')); ?>

                </p>

            </section>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->



        <form x-data="{
            'body': $wire.entangle('body'),
            insertNewLine: function(textarea) {
                
                var startPos = textarea.selectionStart;
                var endPos = textarea.selectionEnd;
        
                
                var text = textarea.value;
                var newText = text.substring(0, startPos) + '\n' + text.substring(endPos, text.length);
        
                
                textarea.value = newText;
                textarea.selectionStart = startPos + 1; // Set cursor position after the inserted newline
                textarea.selectionEnd = startPos + 1;
        
                
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
        
            }
        }" x-init="
             document.querySelector('emoji-picker')
            .addEventListener('emoji-click', event => {
                // Get the emoji unicode from the event
                const emoji = event.detail['unicode'];
        
                // Get the current value and cursor position
                const inputField = $refs.body;
                const inputFieldValue = inputField._x_model.get() ?? '';
        
                const startPos = inputField.selectionStart;
                const endPos = inputField.selectionEnd;
        
                // Insert the emoji at the current cursor position
                const newValue = inputFieldValue.substring(0, startPos) + emoji + inputFieldValue.substring(endPos);
        
                // Update the value and move cursor after the emoji
                inputField._x_model.set(newValue);
        
        
                inputField.setSelectionRange(startPos + emoji.length, startPos + emoji.length);
            });"
            @submit.prevent="((body && body?.trim().length > 0) || ($wire.media && $wire.media.length > 0)|| ($wire.files && $wire.files.length > 0)) ? $wire.sendMessage() : null"
            method="POST" autocapitalize="off" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['flex items-center col-span-12 w-full  gap-2 gap-5']); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" autocomplete="false" style="display: none">


            
            <div class="w-10 hidden sm:flex max-w-fit  items-center">
                <button wire:loading.attr="disabled" type="button" dusk="emoji-trigger-button" @click="openEmojiPicker = ! openEmojiPicker"
                    x-ref="emojibutton" class=" disabled:cursor-progress rounded-full p-px dark:border-gray-700">
                    <svg x-bind:style="openEmojiPicker && { color: 'var(--primary-color)' }" viewBox="0 0 24 24"
                        height="24" width="24" preserveAspectRatio="xMidYMid meet"
                        class="w-7 h-7 text-gray-700 dark:text-gray-300 srtoke-[1.3] dark:stroke-[1.2]" version="1.1"
                        x="0px" y="0px" enable-background="new 0 0 24 24">
                        <title>smiley</title>
                        <path fill="currentColor"
                            d="M9.153,11.603c0.795,0,1.439-0.879,1.439-1.962S9.948,7.679,9.153,7.679 S7.714,8.558,7.714,9.641S8.358,11.603,9.153,11.603z M5.949,12.965c-0.026-0.307-0.131,5.218,6.063,5.551 c6.066-0.25,6.066-5.551,6.066-5.551C12,14.381,5.949,12.965,5.949,12.965z M17.312,14.073c0,0-0.669,1.959-5.051,1.959 c-3.505,0-5.388-1.164-5.607-1.959C6.654,14.073,12.566,15.128,17.312,14.073z M11.804,1.011c-6.195,0-10.826,5.022-10.826,11.217 s4.826,10.761,11.021,10.761S23.02,18.423,23.02,12.228C23.021,6.033,17.999,1.011,11.804,1.011z M12,21.354 c-5.273,0-9.381-3.886-9.381-9.159s3.942-9.548,9.215-9.548s9.548,4.275,9.548,9.548C21.381,17.467,17.273,21.354,12,21.354z  M15.108,11.603c0.795,0,1.439-0.879,1.439-1.962s-0.644-1.962-1.439-1.962s-1.439,0.879-1.439,1.962S14.313,11.603,15.108,11.603z">
                        </path>
                    </svg>
                </button>
            </div>

            
            
            <!--[if BLOCK]><![endif]--><?php if(count($this->media) == 0 &&  count($this->files) == 0 && (config('wirechat.allow_file_attachments', true) || config('wirechat.allow_media_attachments', true))): ?>
                <?php if (isset($component)) { $__componentOriginalb222b361216ac3c45ac7f12e58d92b0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb222b361216ac3c45ac7f12e58d92b0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wirechat::components.popover','data' => ['position' => 'top','popoverOffset' => '70']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wirechat::popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'top','popoverOffset' => '70']); ?>

                     <?php $__env->slot('trigger', null, ['wire:loading.attr' => 'disabled']); ?> 
                        <span dusk="upload-trigger-button">

                            
                            

                            
                            <svg class="size-6 w-7 h-7 text-gray-600 dark:text-white/60"
                                xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.1" stroke-linecap="round"
                                stroke-linejoin="round" class="ai ai-Attach">
                                <path
                                    d="M6 7.91V16a6 6 0 0 0 6 6v0a6 6 0 0 0 6-6V6a4 4 0 0 0-4-4v0a4 4 0 0 0-4 4v9.182a2 2 0 0 0 2 2v0a2 2 0 0 0 2-2V8" />
                            </svg>

                        </span>

                     <?php $__env->endSlot(); ?>

                    
                    <div class="grid gap-2 w-full ">

                        
                        <!--[if BLOCK]><![endif]--><?php if(config('wirechat.allow_file_attachments', true)): ?>
                            <label 
                              wire:loading.class="cursor-progress" 
                               x-data="attachments('files')" class="cursor-pointer">
                                <input 
                                    wire:loading.attr="disabled"
                                    dusk="file-upload-input"
                                    @change="handleFileSelect(event, <?php echo e(count($files)); ?>)" type="file" multiple
                                    accept="<?php echo e(Helper::formattedFileMimesForAcceptAttribute()); ?>" class="sr-only"
                                    style="display: none">

                                <div
                                    class="w-full  flex items-center gap-3 px-1.5 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer">

                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" style="color: var(--primary-color);"
                                            class="bi bi-folder-fill w-6 h-6" viewBox="0 0 16 16">
                                            <path
                                                d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981z" />
                                        </svg>
                                    </span>

                                    <span class=" dark:text-white">
                                        File
                                    </span>
                                </div>
                            </label>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                        
                        <!--[if BLOCK]><![endif]--><?php if(config('wirechat.allow_media_attachments', true)): ?>
                            <label  
                            wire:loading.class="cursor-progress" 
                            w x-data="attachments('media')" class="cursor-pointer">

                                
                                <input dusk="media-upload-input"
                                      wire:loading.attr="disabled"
                                    @change="handleFileSelect(event, <?php echo e(count($media)); ?>)" type="file" multiple
                                    accept="<?php echo e(Helper::formattedMediaMimesForAcceptAttribute()); ?>" class="sr-only"
                                    style="display: none">

                                <div
                                    class="w-full flex items-center gap-3 px-1.5 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer">

                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-6 h-6" style="color: var(--primary-color);">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>

                                    <span class=" dark:text-white">
                                        Photos & Videos
                                    </span>
                                </div>
                            </label>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb222b361216ac3c45ac7f12e58d92b0e)): ?>
<?php $attributes = $__attributesOriginalb222b361216ac3c45ac7f12e58d92b0e; ?>
<?php unset($__attributesOriginalb222b361216ac3c45ac7f12e58d92b0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb222b361216ac3c45ac7f12e58d92b0e)): ?>
<?php $component = $__componentOriginalb222b361216ac3c45ac7f12e58d92b0e; ?>
<?php unset($__componentOriginalb222b361216ac3c45ac7f12e58d92b0e); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            
            

            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['flex gap-2 sm:px-2 w-full']); ?>">
                <textarea @focus-input-field.window="$el.focus()" autocomplete="off" x-model='body' x-ref="body"
 
                     wire:loading.delay.longest.attr="disabled"
                    id="chat-input-field" autofocus type="text" name="message" placeholder="Message" maxlength="1700"
                    rows="1" @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px';"
                    @keydown.shift.enter.prevent="insertNewLine($el)"  @keydown.enter.prevent=""
                    @keyup.enter.prevent="$event.shiftKey ? null : (((body && body?.trim().length > 0) || ($wire.media && $wire.media.length > 0)) ? $wire.sendMessage() : null)"
                    class="w-full disabled:cursor-progress resize-none h-auto max-h-20  sm:max-h-72 flex grow border-0 outline-0 focus:border-0 focus:ring-0  hover:ring-0 rounded-lg   dark:text-white bg-none dark:bg-inherit  focus:outline-none   "
                    x-init="document.querySelector('emoji-picker')
                        .addEventListener('emoji-click', event => {
                            const emoji = event.detail['unicode'];
                            const inputField = $refs.body;
                    
                            // Get the current cursor position (start and end)
                            const startPos = inputField.selectionStart;
                            const endPos = inputField.selectionEnd;
                    
                            // Get current value of the input field
                            const currentValue = inputField.value;
                    
                            // Insert the emoji at the cursor position, preserving line breaks and spaces
                            const newValue = currentValue.substring(0, startPos) + emoji + currentValue.substring(endPos);
                    
                            // Update Alpine.js model (x-model='body') with the new value
                            inputField._x_model.set(newValue);
                    
                            // Set the cursor position after the inserted emoji
                            inputField.setSelectionRange(startPos + emoji.length, startPos + emoji.length);
                    
                            // Ensure the textarea resizes correctly after adding the emoji
                            inputField.style.height = 'auto';
                            inputField.style.height = inputField.scrollHeight + 'px';
                        });"></textarea>
               

            </div>

            
            
            

            <div x-cloak
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'w-[5%] justify-end min-w-max  items-center gap-2 ', ]); ?>">

                
                    <button    x-show="((body?.trim()?.length>0) ||  $wire.media.length > 0 || $wire.files.length > 0 )"
                        wire:loading.attr="disabled" type="submit" id="sendMessageButton" class=" ml-auto disabled:cursor-progress font-bold">

                        <svg class="w-7 h-7   dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="36"
                            height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="ai ai-Send">
                            <path
                                d="M9.912 12H4L2.023 4.135A.662.662 0 0 1 2 3.995c-.022-.721.772-1.221 1.46-.891L22 12 3.46 20.896c-.68.327-1.464-.159-1.46-.867a.66.66 0 0 1 .033-.186L3.5 15" />
                        </svg>
    
                    </button>

               

                
                    <button  x-show="!((body?.trim()?.length>0) || $wire.media.length > 0 || $wire.files.length > 0 )"
                       wire:loading.attr="disabled" wire:click='sendLike()' type="button" class="group disabled:cursor-progress">

                        <!-- outlined heart -->
                        <span class=" group-hover:hidden transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="w-7 h-7 text-gray-600 dark:text-white/90 stroke-[1.4] dark:stroke-[1.4]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </span>
                        <!--  filled heart -->
                        <span class="hidden group-hover:block transition " x-bounce>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 w-7 h-7   text-red-500">
                                <path
                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>
                        </span>
    
                    </button>

               
            </div>

        </form>
    </section>



        <?php
        $__scriptKey = '1089747481-0';
        ob_start();
    ?>
    <script>
        Alpine.data('attachments', (type = "media") => ({
            // State variables
            isDropping: false, // Tracks if a file is being dragged over the drop area
            type: type, // Type of file being uploaded (e.g., "media" or "file")
            isUploading: false, // Indicates if files are currently uploading
            MAXFILES: <?php echo json_encode(config('wirechat.attachments.max_uploads', 5), 512) ?>, // Maximum number of files allowed
            maxSize: <?php echo json_encode(config('wirechat.attachments.media_max_upload_size', 12288), 512) ?> * 1024, // Max size per file (in bytes)
            allowedFileTypes: type === 'media' ? <?php echo json_encode(config('wirechat.attachments.media_mimes'), 15, 512) ?> : <?php echo json_encode(config('wirechat.attachments.file_mimes'), 15, 512) ?>, // Allowed MIME types based on type
            progress: 0, // Progress of the current upload (0-100)
            wireModel: type, // The Livewire model to bind to
    
            // Handle file selection from the input field
            handleFileSelect(event, count) {
                if (event.target.files.length) {
                    const files = event.target.files;
    
                    // Validate selected files and upload if valid
                    this.validateFiles(files, count)
                        .then((validFiles) => {
                            if (validFiles.length > 0) {
                                this.uploadFiles(validFiles);
                            } else {
                                console.log('No valid files to upload');
                            }
                        })
                        .catch((error) => {
                            console.log('Validation error:', error);
                        });
                }
            },
    
            // Upload files using Livewire's upload
            // uploadFiles(files) {
            //     this.isUploading = true;
            //     this.progress = 0;

            //     // Initialize per-file progress tracking
            //     const fileProgress = Array.from(files).map(() => 0);
            //     files.forEach((file, index) => {
            //         $wire.upload(
            //             `${this.wireModel}`, // Livewire model
            //             file, // Single file
            //             () => {
            //                 fileProgress[index] = 100; // Mark this file as complete
            //                 // this.isUploading = false;
            //                 this.progress = Math.round((fileProgress.reduce((a, b) => a + b, 0)) / files.length);
            //             },
            //             (error) => {
            //                 // this.isUploading = false;
            //                 fileProgress[index] = -1; // Mark as failed
            //                 $dispatch('wirechat-toast', { type: 'error', message: `Validation error: ${error}` });
            //             },
            //             (event) => {
            //                 fileProgress[index] = event.detail.progress; // Update per-file progress
            //                 this.progress = Math.round((fileProgress.reduce((a, b) => a + b, 0)) / files.length); // Overall progress
            //             }
            //         );
            //     });
            // },

             // Upload files using Livewire's uploadMultiple method
            uploadFiles(files) {
                this.isUploading = true; // Set uploading state to true
                this.progress = 0; // Reset progress bar

                // Call Livewire's uploadMultiple with callbacks for progress, success, and error
                $wire.uploadMultiple(
                    `${this.wireModel}`, // The Livewire model name
                    files, // The array of files to upload
                    (success) => {
                        // Success callback
                        console.log('Upload complete:', success);
                        this.isUploading = false; // Reset uploading state
                        this.progress = 0; // Reset progress
                    },
                    (error) => {
                        // Error callback
                        console.log('Upload error:', error);
                        $dispatch('wirechat-toast', { type: 'error', message: `Validation error: ${error}` }); // Show error message
                        this.isUploading = false; // Reset uploading state
                        this.progress = 0; // Reset progress
                    },
                    (event) => {
                        // Progress callback
                        this.progress = event.detail.progress; // Update progress bar
                    }
                );
            },


    
            // Remove an uploaded file from Livewire
            removeUpload(filename) {
                $wire.removeUpload(this.wireModel, filename);
            },
    
            // Validate selected files against constraints
            validateFiles(files, count) {
                const totalFiles = count + files.length; // Total file count including existing uploads
    
                // Check if total file count exceeds the maximum allowed
                if (totalFiles > this.MAXFILES) {
                    files = Array.from(files).slice(0, this.MAXFILES - count); // Limit files to the allowed number
                    $dispatch('wirechat-toast', {
                        type: 'warning',
                        message: `File limit exceeded, allowed ${this.MAXFILES}`
                    });
                }
    
                // Filter invalid files based on size and type
                const invalidFiles = Array.from(files).filter((file) => {
                    const fileType = file.type.split('/')[1].toLowerCase(); // Extract file extension
                    return file.size > this.maxSize || !this.allowedFileTypes.includes(fileType); // Check size and type
                });
    
                // Filter valid files
                const validFiles = Array.from(files).filter((file) => {
                    const fileType = file.type.split('/')[1].toLowerCase();
                    return file.size <= this.maxSize && this.allowedFileTypes.includes(fileType);
                });
    
                // Handle invalid files by showing appropriate error messages
                if (invalidFiles.length > 0) {
                    invalidFiles.forEach((file) => {
                        if (file.size > this.maxSize) {
                            $dispatch('wirechat-toast', {
                                type: 'warning',
                                message: `File size exceeds the maximum limit (${this.maxSize / 1024 / 1024}MB): ${file.name}`
                            });
                        } else {
                            const extension = file.name.split('.').pop().toLowerCase();
                                $dispatch('wirechat-toast', {
                                    type: 'warning',
                                    message: `One or more Files not uploaded: .${extension} (type not allowed)`
                                });

                        }
                    });
                }
    
                return Promise.resolve(validFiles); // Return valid files for further processing
            }
        }));
    </script>
    
    
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
</div>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/chat/footer.blade.php ENDPATH**/ ?>