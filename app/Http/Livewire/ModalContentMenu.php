<?php 

namespace App\Http\Livewire;

use Livewire\Component; 


class ModalContentMenu extends Component
{

    
    protected $listeners = ['display-modal' => 'modalShow'];
    public $showModalMenu = false;


    public function modalShow()
    {
        $this->showModalMenu = true;
    }

    public function render()
    {
        return view('livewire.modal-content-menu');
    }
}

?>