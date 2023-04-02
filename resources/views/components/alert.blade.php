@if (session()->has('success'))
    <div onclick="this.remove()"
        class="text-green-900 font-mono text-sm bg-green-200 w-full text-center rounded-sm py-2 cursor-pointer hover:shadow px-2">
        {{ session()->get('success') }}
    </div>
@endif
