<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class ModalComponent extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|min:4')]
    public $password;

    #[Rule('required|email|unique:users')]
    public $email;

    public $count = 1;

    public function increment()
    {
        $this->count++;
           // Handle form submission logic
    }

    public function decrement()
    {
        $this->count--;
    }

    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modal-component');
    }

    public function submitForm(){
        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Account has been created',
            icon:'success'
        );

        sleep(1);

        $fields = $this->validate();

        $user = User::create($fields);

        // dd($user);
        //reset fields
        $this->reset(['name','email','password']);

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Account has been created',
            icon:'success'
        );
        //comunicate to other components on page
        // $this->dispatch('user-created',compact('user'));

    }

}
