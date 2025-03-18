@props(['title'])
<div x-data="{show:false}" x-show="show" 
x-on:open-modal.window="show = true" 
x-on:close-modal.window="show = false"
x-on:keydown.escape.window="show = false"
class="fixed z-50 inset-0">

<div class="fixed inset-0 bg-gray-300 opacity-400 " x-on:click="$dispatch('close-modal')"></div>

<div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height:500px;">
    @if (isset($title))
        <div class="py-3 flex items-center justify-center">
            {{$title ?? ''}}
        </div>
    @endif
    <div>Body</div>
</div>

</div>