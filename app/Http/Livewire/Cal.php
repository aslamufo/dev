<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cal extends Component
{

    public $calc = 0;
    public float $cacc = 0;
    public $sym = 0;


    public function fun($n)
    {
        $this->calc = $this->calc * 10 + $n;
    }

    public function cac($n)
    {
        switch ($n) {
            case 1:
                $this->cacc = $this->calc + $this->cacc;
                $this->calc = 0;
                $this->sym = 1;
                break;
            case 2:
                $this->cacc = $this->calc - $this->cacc;
                $this->calc = 0;
                $this->sym = 1;
                break;
            case 3:
                $this->cacc = $this->calc * $this->cacc;
                $this->calc = 0;
                $this->sym = 1;
                break;
            case 4:
                $this->cacc = $this->calc / $this->cacc;
                $this->calc = 0;
                $this->sym = 1;
                break;
        }
    }
    public function render()
    {
        return view('livewire.cal');
    }
}
