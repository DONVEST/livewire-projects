<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{

    use WithPagination;
    
    // listen for event 'user-created' and execute upadateList
    #[On('user-created')]
    public function updateList($user = null){}
    
    #[Computed()]
    // public function users(){
    //     return User::latest()->paginate(3);
    //     // then use '$this->users' inside your blade component or controller 
    // }
    
    public function placeholder(){
        return view('text_placeholder');
    }
    
    public function render()
    {
        $users = User::latest()->paginate(3);
        
        return view('livewire.users-list',compact('users'));
    }
}