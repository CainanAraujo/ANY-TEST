        <div class="w-full h-[calc(100vh_-_0.0rem)]  flex rounded-lg" >
            <div class=" hidden md:grid bg-inherit  dark:bg-inherit  relative w-full h-full md:w-[360px] lg:w-[400px] xl:w-[500px]  shrink-0 overflow-y-auto  ">

      
               <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('chats', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2739899654-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?> 

            </div>
            
            <main  class="  grid  w-full  grow  h-full relative overflow-y-auto"  style="contain:content">

              
              <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('chat', ['conversation' => ''.e($conversation_id).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2739899654-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            </main>


        </div><?php /**PATH /home/cainan/Documents/wirechat-app/storage/framework/views/8ffa465de040664f03864cbeaa124d2d.blade.php ENDPATH**/ ?>