

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="flex items-center p-4 w-[920px]">
                <div class="w-3/12">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movieDataArr['poster_path'] }}" alt="Poster" class="rounded ">
                </div>
                <div class="w-9/12">
                    <div class="ml-5">
                        <h2 class="text-2xl text-gray-900 font-semibold mb-2">{{ $movieDataArr['title'] }} ({{ date('Y',strtotime($movieDataArr['release_date'])) }})</h2>
                        <div class="mb-1 flex mb-4 sm:flex-nowrap flex-wrap d-none">
                            @if(count($movieDataArr['genres']) > 0)
                                @php
                                    $num_of_items = count($movieDataArr['genres']);
                                    $num_count = 0;
                                @endphp
                                @foreach ($movieDataArr['genres'] as $singleGenre)
                                    <span class="text-sm">
                                        {{ $singleGenre->name }}
                                    </span>
                                    @php
                                        $num_count = $num_count + 1;
                                        if ($num_count < $num_of_items) {
                                            echo '<span class="mx-2 flex items-center">•</span>';
                                        }
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Release Date</h1>
                            <p class="leading-6 text-sm">{{ $movieDataArr['release_date'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Rating</h1>
                            <p class="leading-6 text-sm">{{ $movieDataArr['vote_average'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Duration</h1>
                            <p class="leading-6 text-sm">{{ $movieDataArr['runtime'] }} min</p>
                        </div>
                        <p class="leading-6 mt-5 text-gray-500">{{ $movieDataArr['overview'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>