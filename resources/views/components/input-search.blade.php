<div class="max-w-[200px]">
    <input role="presentation" value="{{ request()->search_query ?? '' }}" name="search_query" id="search_input"
        class="outline-none px-2 h-full w-full " type="text" placeholder="Enter keyword...">
    @if (count($queries)){
        <div class="absolute transition  flex-col duration-300 bg-white min-w-[150px] max-w-[200px] hidden h-[200px] rounded-sm shadow overflow-y-auto"
            id="list_queries">
            @foreach ($queries as $query)
                <a href="/jobs?search_query={{ $query->search_query }}"
                    class="py-1 px-2 truncate text-sm text-gray-600 hover:bg-slate-200 cursor-pointer">
                    {{ $query->search_query }}</a>
            @endforeach
        </div>
        }
    @endif
</div>


<script>
    document.getElementById('search_input').onfocus = (e) => {
        let c = e.target.nextElementSibling.classList
        c.remove('hidden')
        c.add('flex')
    }
</script>
