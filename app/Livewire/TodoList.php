<?php

namespace App\Livewire;

use App\Models\Todo;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name; 
    public $search;
    public $editId;

    #[Rule('required|min:3|max:50')]
    public $editName;

    public function placeholder(){
        return view('text_placeholder');
    }

    public function create(){
        $fields = $this->validateOnly('name');

        Todo::create($fields);

        $this->reset('name');

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Your Todo has been added',
            icon:'success'
        );

        //got bage to the first page
        $this->resetPage();
        
    }

    public function delete($id){
        
        try {
            Todo::findOrfail($id)->delete();
            $this->dispatch(
                'alert',
                title:'Successful',
                text:'Your Todo with ID:'.$id.' has been Deleted',
                icon:'success'
            );
        } catch (Exception $e) {
            $this->dispatch(
                'alert',
                title:'Successful',
                text:'Your Todo was not found',
                icon:'info'
            );
            return;
        }
    }

    public function toggle($id){
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($id){
        $this->editId = $id;
        $this->editName = Todo::find($id)->name;
    }
    
    public function cancelEdit(){
        $this->reset('editId','editName');
    }

    public function update(){

        $this->validateOnly('editName');
        
        $todo = Todo::find($this->editId);
        $todo->name = $this->editName;
        $todo->updated_at = Carbon::now();
        $todo->save();

        $this->cancelEdit();
       
        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Your Todo name with ID:'.$todo->id.' has been Updated',
            icon:'success'
        );
    }
    
    public function render()
    {
        sleep(1);
        
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(3)
        ]);
    }
}