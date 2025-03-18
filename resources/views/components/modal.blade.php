<div x-data="{show:false}" x-show="show" 
x-on:open-modal.window="show = true" 
x-on:close-modal.window="show = false"
x-on:keydown.escape.window="show = false"
class="fixed z-50 inset-0">

<div class="fixed inset-0 bg-gray-300 opacity-400 "></div>

<div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height:500px;">
    <div>Header</div>
    <div>Body</div>
</div>

</div>