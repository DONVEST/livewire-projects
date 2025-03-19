<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\User;
use Livewire\Component;

class ModalComponent2 extends Component
{
    use WithPagination;

    public $users;
    public $search;


    public function render()
    {
        return view('livewire.modal-component2');
    }

    public function mount(){
        $this->users = User::latest()->get();
    }

    public function poll() {
        $this->users = User::latest()->get();
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

}
