<?php
 
use function Livewire\Volt\{state};

// use function Livewire\Volt\{mount};
// use function Livewire\Volt\{boot};
// use function Livewire\Volt\{booted};
// use function Livewire\Volt\{hydrate};
// use function Livewire\Volt\{dehydrate};
// use function Livewire\Volt\{updating};
// use function Livewire\Volt\{updated};

state(['count' => 0]);
state(['lifecycle' => 'lifecycle']);
 
$increment = fn () => $this->count++;

// boot(fn () => $this->lifecycle = "boot");
// booted(fn () => $this->lifecycle = "booted");
// hydrate(fn () => $this->lifecycle = "hydrate");
// hydrate(['count' => fn () => $this->lifecycle = "dehydrate"]);
// dehydrate(['count' => fn () => $this->lifecycle = "dehydrate"]);
// updating(['count' => fn () => $this->lifecycle = "updating"]);
// updated(['count' => fn () => $this->lifecycle = "updated"]);
// mount(fn () => $this->lifecycle = "mount");
 
?>
 
<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>

    <h2>{{ $lifecycle }}</h2>
</div>
