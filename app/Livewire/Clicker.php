<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:4')]
    public $password;

    //for render function
    use WithPagination;
    
    public function render()
    {
        $users = User::paginate(2,['*'], __('page'))->onEachSide(2);
        $title = 'title';
        
        
        return view('livewire.clicker',compact('title','users'));
    }

    public function createNewUser(){
        
        $name = str()->random();
        $password = str()->password();
        $email = ''.str()->random().'@gmail.com';
        
        User::create([
            'name' => $name,
            'password' => $password,
            'email' => $email,
        ]);
    }
    
    public function submit(){
        
        // $this->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:4'
        // ]); 

        $this->validate();
        
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        //reset fields
        $this->reset(['name','email','password']);

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'User has been added',
            icon:'success'
        );
        
    }
}