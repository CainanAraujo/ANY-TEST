
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'position'=>'bottom',
    'popoverOffset'=>'20'

    ]
));

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
    'position'=>'bottom',
    'popoverOffset'=>'20'

    ]
), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div x-data="{
    popoverOpen: false,
    popoverArrow: false,
    popoverPosition: 'top',
    popoverHeight: 0,
    popoverOffset: 40,
    popoverHeightCalculate() {
        this.$refs.popover.classList.add('invisible'); 
        this.popoverOpen=true; 
        let that=this;
        $nextTick(function(){ 
            that.popoverHeight = that.$refs.popover.offsetHeight;
            that.popoverOpen=false; 
            that.$refs.popover.classList.remove('invisible');
            that.$refs.popoverInner.setAttribute('x-transition', '');
            that.popoverPositionCalculate();
        });
    },
    popoverPositionCalculate(){
        if(window.innerHeight < (this.$refs.popoverButton.getBoundingClientRect().top + this.$refs.popoverButton.offsetHeight + this.popoverOffset + this.popoverHeight)){
            this.popoverPosition = 'top';
        } else {
            this.popoverPosition = 'bottom';
        }
    }
}"
x-init="
    that = this;
    window.addEventListener('resize', function(){
        popoverPositionCalculate();
    });
    $watch('popoverOpen', function(value){
        if(value){ popoverPositionCalculate(); document.getElementById('width').focus();  }
    });
"
class="relative overflow-visible">

<button <?php echo e($trigger->attributes->class(["flex items-center justify-center disabled:cursor-progress"] )); ?> type="button" x-ref="popoverButton" @click="popoverOpen=!popoverOpen">
     <?php echo e($trigger); ?>

</button>

<div x-ref="popover"
    x-anchor.offset.17="$refs.popoverButton"  
    x-show="popoverOpen"

    x-init="setTimeout(function(){ popoverHeightCalculate(); }, 100);"
    @click.away="popoverOpen=false;"
    @keydown.escape.window="popoverOpen=false"
    class=" min-w-[13rem]  max-w-fit " 
    x-cloak
    @click="popoverOpen=false" >
    <div 
    
    
    x-ref="popoverInner" x-show="popoverOpen" class="w-full p-2 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-sm border-neutral-200/70">
        <div x-show="popoverArrow && popoverPosition == 'bottom'" class="absolute top-0 inline-block w-5 mt-px overflow-hidden -translate-x-2 -translate-y-2.5 left-1/2"><div class="w-2.5 h-2.5 origin-bottom-left transform rotate-45 bg-white border-t border-l rounded-sm"></div></div>
        <div x-show="popoverArrow  && popoverPosition == 'top'" class="absolute bottom-0 inline-block w-5 mb-px overflow-hidden -translate-x-2 translate-y-2.5 left-1/2"><div class="w-2.5 h-2.5 origin-top-left transform -rotate-45 bg-white border-b border-l rounded-sm"></div></div>
        <div class="grid gap-4">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>
</div><?php /**PATH /home/cainan/Documents/wirechat-app/vendor/namu/wirechat/src/../resources/views/components/popover.blade.php ENDPATH**/ ?>