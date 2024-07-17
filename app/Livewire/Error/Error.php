<?php

namespace App\Livewire\Error;

use Livewire\Component;

class Error extends Component
{
    public $error;

    public function mount($error = null)
    {
        if ($error == null) $error = "Erro Interno";
        $this->error = $error;
    }

    public function render()
    {
        return view('livewire.error.error', [
            'error' => $this->error
        ]);
    }
}
