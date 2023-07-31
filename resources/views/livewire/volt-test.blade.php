<?php
 
use function Livewire\Volt\{state};
use function Livewire\Volt\{action};
 
state(count: 0);
 
$increment = fn () => $this->count++;
// $increment = action(fn () => $this->count++)->renderless();
// $increment = function () {
//   echo 'not working';
// }
 
?>
 
@volt('volt-test')
<div>    
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>
@endvolt
