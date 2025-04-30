<?php use \Namu\WireChat\Facades\WireChat; ?>

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'previousMessage' => $previousMessage,
    'message' => $message,
    'nextMessage' => $nextMessage,
    'belongsToAuth' => $belongsToAuth,
    'primaryColor'=> WireChat::getColor(),
    'isGroup'=>false

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
    'previousMessage' => $previousMessage,
    'message' => $message,
    'nextMessage' => $nextMessage,
    'belongsToAuth' => $belongsToAuth,
    'primaryColor'=> WireChat::getColor(),
    'isGroup'=>false

]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div



style="<?php echo \Illuminate\Support\Arr::toCssStyles([
'background-color:'. $primaryColor .'' => $belongsToAuth==true
]) ?>"

<?php
    $isSameAsNext = $message?->sendable?->is($nextMessage?->sendable);
    $isSameAsPrevious = $message?->sendable?->is($previousMessage?->sendable);
    $isNotSameAsNext = $message?->sendable?->isNot($nextMessage?->sendable);
    $isNotSameAsPrevious = $message?->sendable?->isNot($previousMessage?->sendable);
?>

class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'flex flex-wrap max-w-fit text-[15px] border border-gray-200/40 dark:border-none rounded-xl p-2.5 flex flex-col text-black bg-[#f6f6f8fb]',
    'text-white' => $belongsToAuth, // Background color for messages sent by the authenticated user
    'dark:bg-gray-800 dark:text-white' => !$belongsToAuth,

    // Message styles based on position and ownership

    // RIGHT
    // First message on RIGHT
    'rounded-br-md rounded-tr-2xl' => ($isSameAsNext && $isNotSameAsPrevious && $belongsToAuth),

    // Middle message on RIGHT
    'rounded-r-md' => ($isSameAsPrevious && $belongsToAuth),

    // Standalone message RIGHT
    'rounded-br-xl rounded-r-xl' => ($isNotSameAsPrevious && $isNotSameAsNext && $belongsToAuth),

    // Last Message on RIGHT
    'rounded-br-2xl' => ($isNotSameAsNext && $belongsToAuth),

    // LEFT
    // First message on LEFT
    'rounded-bl-md rounded-tl-2xl' => ($isSameAsNext && $isNotSameAsPrevious && !$belongsToAuth),

    // Middle message on LEFT
    'rounded-l-md' => ($isSameAsPrevious && !$belongsToAuth),

    // Standalone message LEFT
    'rounded-bl-xl rounded-l-xl' => ($isNotSameAsPrevious && $isNotSameAsNext && !$belongsToAuth),

    // Last message on LEFT
    'rounded-bl-2xl' => ($isNotSameAsNext && !$belongsToAuth),
]); ?>"
>
<!--[if BLOCK]><![endif]--><?php if(!$belongsToAuth && $isGroup): ?>
<div    
    
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'shrink-0 font-medium text-purple-500',
        // Hide avatar if the next message is from the same user
        'hidden' => $message?->sendable?->is($previousMessage?->sendable)
    ]); ?>">
    <?php echo e($message->sendable?->display_name); ?>

</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<pre class="whitespace-pre-line tracking-normal text-sm md:text-base dark:text-white lg:tracking-normal"
    style="font-family: inherit;">
    <?php echo e($message->body); ?>

</pre>


<span
class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-[11px] ml-auto ',  'text-gray-700 dark:text-gray-300' => !$belongsToAuth,'text-gray-100' => $belongsToAuth]); ?>">
    <?php
        // If the message was created today, show only the time (e.g., 1:00 AM)
        echo $message->created_at->format('H:i');
    ?>
</span>

</div>
<?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/chat/message.blade.php ENDPATH**/ ?>