@if (session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
            <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('alert'))
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
            <p class="text-sm">{{ session('alert') }}</p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('alerts'))
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
                @foreach(session('alerts') as $alert)
                    <div>
                        <p class="text-3xl text-black"> {{$alert }}</p>
                    </div>
                @endforeach
        </div>
    </div>
@endif

