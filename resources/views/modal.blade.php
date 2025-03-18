<x-app-layout>

    <x-modal name='1' title="modal 1">
        <livewire:register />
    </x-modal>
    
    
    <x-modal name='2' title="modal 2">
        <livewire:users-modal />
    </x-modal>

    <button x-data @click="$dispatch('open-modal',{name:'1'})" 
    class="px-3 py-1 bg-teal-500 text-white rounded">Open Modal</button>

    <button x-data @click="$dispatch('open-modal',{name:'2'})" 
    class="px-3 py-1 bg-teal-500 text-white rounded">Open Modal</button>

</x-app-layout>