<script src="https://cdn.tailwindcss.com"></script>

<section class="flex items-center justify-center">
    <div class="lg:w-1/2 md:w-10/12 w-full flex flex-col items-center ">
        <!-- title & navigation -->
        <livewire:title-navigation />

        <!-- movie lists loop -->
        @foreach($moviesResArr as $movieDataArr)
          <livewire:movie-list-card :movieDataArr="$movieDataArr" :tag="$tag" :wire:key="$loop->index"/>
        @endforeach
    </div>
</section>
