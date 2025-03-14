<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Register extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:4')]
    public $password;

    #[Rule('nullable|sometimes|image|max:4096')]
    public $image;

    //for render function
    use WithPagination;

    //for accepting file uploads
    use WithFileUploads;
    

    public function placeholder(){
        return view('text_placeholder');
    }
    
    public function render()
    {
        
        return view('livewire.register');
    }

    public function create(){

        sleep(1);

        $fields = $this->validate();  
        
        if($this->image){
            $image_name = $this->image->hashName();
            $this->image->store('images/uploads','public');
            $fields['image'] = $image_name;
        }

        
        $user = User::create($fields);

        //reset fields
        $this->reset(['name','email','password','image']);

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Account has been created',
            icon:'success'
        );

        //comunicate to other components on page
        $this->dispatch('user-created',compact('user'));
        
    }

    public function reloadList(){
        $this->dispatch('user-created');
        
    }
}