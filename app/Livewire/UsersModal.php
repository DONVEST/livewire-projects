<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class UsersModal extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $search;

    // listen for event 'user-created' and execute upadateList
    #[On('user-created')]
    public function updateList($user = null){}

    
    public function placeholder(){
        return view('text_placeholder');
    }

    public function render()
    {
        $users = User::latest()->where('name','like',"%{$this->search}%")->paginate(3);

        return view('livewire.users-modal',compact('users'));
    }
}
