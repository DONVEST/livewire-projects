<div style="max-width: 500px;margin:0% auto;">
    {{-- The Master doesn't talk, he acts. --}}

    @include('livewire.include.todo.create-todo-box')
    
    @include('livewire.include.todo.search-box')

    @if (count($todos) != 0)
    <div id="todos-list" class="shadow p-3 rounded-2xl">
        
        @foreach ($todos as $todo)
            @include('livewire.include.todo.todo-card')
        @endforeach

        <div class="my-2 col-12 ">
            {{$todos->links()}}
        </div>
    </div>
    @else
        
    @endif

</div>
