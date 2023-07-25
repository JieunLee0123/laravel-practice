<?php  

namespace App\Livewire;  

use Livewire\Component; 
use Illuminate\Support\Arr;

class Cookie extends Component  
{  
    private array $waffles = [  
        '딸기요거트 와플',  
        '딸기누텔라 와플',  
        '요거트아이스크림 와플',  
        '바나나누텔라땅콩크림 와플',  
    ];

    public string $waffle;

    /** @locked  */  
    public int $currentIndex = 0;  

    public function rotate()
    {
        // $this->waffle = Arr::random($this->waffles);

        $key = array_rand($this->waffles);  

        if ($key !== $this->currentIndex) {  
            $this->currentIndex = $key;  
            $this->waffle = $this->waffles[$key];  
        } else {  
            $this->rotate();  
        }  
    }

    public function mount()  
    {  
        $this->rotate();  
    }

    public function render()
    {
        return view('livewire.cookie');  
    }  
}