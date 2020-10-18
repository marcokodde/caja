<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Countries
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif

            <button wire:click="create()" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create Country
            </button>
            <input type="text" 
                    wire:model="search" 
                    placeholder="Country Name" 
                    class="w-200 shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
            @if($isOpen)
                @include('livewire.countries.create')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Country</th>
                        <th class="px-4 py-2 w-20">Code</th>
                        <th class="px-4 py-2 w-20">Url</th>
                        <th class="px-4 py-2 w-20">Default</th>
                        <th class="px-4 py-2 w-20">Include</th>
                        <th class="px-4 py-2 w-20">Latinoamerica</th>
                        <th colspan="2" class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td class="border px-4 py-2 W-50">{{ $record->country }}</td>
                        <td class="border px-4 py-2 w-20">{{ $record->code }}</td>
                        <td class="border px-4 py-2 w-20">{{ $record->url }}</td>
                        <td class="border px-4 py-2 w-20 text-center">
                           <input type="checkbox" 
                            @if($record->default)  checked @endif>
                        </td>
                        <td class="border px-4 py-2 w-20 text-center">
                            <input type="checkbox" 
                             @if($record->include)  checked @endif>
                         </td>
                         <td class="border px-4 py-2 w-20 text-center">
                            <input type="checkbox" 
                             @if($record->latinoamerica)  checked @endif>
                         </td>
                        <td colspan="2" class="border px-4 py-2 text-center">
                        <button wire:click="edit({{ $record->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button wire:click="delete({{ $record->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $records->links() }}
        </div>
    </div>
</div>
