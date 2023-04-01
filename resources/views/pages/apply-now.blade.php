@extends('layouts.index')

@section('content')
    <div>
        <form action="/jobs/{{ $job->id }}/applynow" method="post" enctype="multipart/form-data"
            class="max-w-[400px] mx-auto bg-white p-3 text-gray-600  rounded-md text-sm">
            @csrf
            <h3 class="text-xl text-purple-600 text-center mt-2 mb-4 font-semibold ">Apply Now</h3>
            <div class="flex flex-col gap-2">

                <div class="flex justify-between items-center">
                    <label class=" font-semibold">Resume</label>
                    <input type="file" name="resume" id="resume" class="hidden">
                    <div class="text-white cursor-pointer bg-purple-400 hover:bg-purple-500 w-fit px-1 rounded-md"
                        onclick="select()" id="select">Select File</div>
                    <div class="text-white cursor-pointer bg-red-400 hover:bg-red-500 w-fit px-1 rounded-md hidden"
                        onclick="cancel()" id="cancel">remove
                    </div>
                </div>
                @error('resume')
                    <p class="text-red-400 ">{{ $message }}</p>
                @enderror

                <label class=" font-semibold" for="cover_letter">cover letter</label>
                <textarea name="cover_letter" class="bg-gray-100 p-1 outline-none rounded-md" id="cover_letter" rows="7"></textarea>
                @error('cover_letter')
                    <p class="text-red-400 ">{{ $message }}</p>
                @enderror
                <button class="px-2 py-1 text-white bg-purple-500 hover:bg-purple-600 rounded-md">Apply</button>
            </div>
        </form>
    </div>

    <script>
        function select() {
            const resume = document.getElementById('resume');
            resume.onchange = () => toggleResume()
            resume.click();
        }

        function cancel() {
            toggleResume()
        }

        function toggleResume() {
            document.getElementById("select").classList.toggle('hidden')
            document.getElementById("cancel").classList.toggle('hidden')
        }
    </script>
@endsection
