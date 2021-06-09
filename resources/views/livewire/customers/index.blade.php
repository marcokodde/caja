@include('common.crud_header')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @include('common.crud_message')
            @include('common.crud_create_button')
            @include('common.crud_search')            
            @if($isOpen)
                @include('livewire.customers.form')
            @endif

            <table class="table-fixed w-auto">
                <thead>
                    <tr class="bg-gray-100">
                    <th class="px-2 py-1">{{__("Name")}}</th>
                    <th class="px-2 py-1">{{__("Phone")}}</th>
                    <th class="px-2 py-1">{{__("Mark")}}</th>
                    <th class="px-2 py-1">{{__("Image")}}</th>
                    <th class="px-2 py-1">{{__("Active")}}</th>
                        <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{ $record->first_name.' '.$record->middle_name.' '.$record->last_name.' '. $record->maternal_name }}</td>
                        <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{ $record->phone }}</td>
                        <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 text-center">
                            <input class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600" type="checkbox" disabled
                             @if($record->marked)  checked @endif>
                        </td>
                        <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{Storage::url($record->photo)}}" alt="photo" />    
                        </td>
                        <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 text-center">
                            <input class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600" type="checkbox" disabled
                             @if($record->active)  checked @endif>
                        </td>
                        <td colspan="3" class="border px-4 py-2 text-center">
                            <button wire:click="selec({{ $record->id }})" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Select</button>
                            <button wire:click="edit({{ $record->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $record->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>                               
                    </tr>
                    @endforeach
                </tbody>
            </table>
           @include('common.pagination')
        </div>
    </div>
</div>
