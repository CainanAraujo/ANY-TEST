<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'previousMessage'=>$previousMessage,
    'message'=>$message,
    'nextMessage'=>$nextMessage,
    'belongsToAuth'=>$belongsToAuth,
    'attachment'=>$attachment

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
    'previousMessage'=>$previousMessage,
    'message'=>$message,
    'nextMessage'=>$nextMessage,
    'belongsToAuth'=>$belongsToAuth,
    'attachment'=>$attachment

]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<img class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 

        'max-w-max  h-[200px] min-h-[210px] bg-gray-50/60 dark:bg-gray-700/20   object-scale-down  grow-0 shrink  overflow-hidden  rounded-3xl',

        'rounded-br-md rounded-tr-2xl'=>($message?->sender_id==$nextMessage?->sender_id && $message?->sender_id!=$previousMessage?->sender_id) && $belongsToAuth,

        //middle message on RIGHT
        'rounded-r-md'=>$previousMessage?->sender_id==$message->sender_id && $belongsToAuth,

        //Standalone message RIGHT
        'rounded-br-xl rounded-r-xl'=>($previousMessage?->sender_id!=$message?->sender_id &&
        $nextMessage?->sender_id!=$message?->sender_id) && $belongsToAuth,


        //last Message on RIGHT
        'rounded-br-2xl '=>$previousMessage?->sender_id!==$nextMessage?->sender_id &&$belongsToAuth,

        //**LEFT

        //first message on LEFT
        'rounded-bl-md rounded-tl-2xl'=>($message?->sender_id==$nextMessage?->sender_id
        &&$message?->sender_id!=$previousMessage?->sender_id) && !$belongsToAuth,

        //middle message on LEFT
        'rounded-l-md'=>$previousMessage?->sender_id==$message->sender_id && !$belongsToAuth,

        //Standalone message LEFT
        'rounded-bl-xl rounded-l-xl '=>($previousMessage?->sender_id!=$message?->sender_id
        &&$nextMessage?->sender_id!=$message?->sender_id) && !$belongsToAuth,

        //last message on LEFT
        'rounded-bl-2xl'=>($message?->sender_id!=$nextMessage?->sender_id ) && !$belongsToAuth,
        ]); ?>" loading="lazy" src="<?php echo e($attachment?->url); ?>" alt="attachment">
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/chat/image.blade.php ENDPATH**/ ?>