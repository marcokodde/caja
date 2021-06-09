@if($records->count())
    @include('common.records_per_page')
@endif
<input type="text"
    wire:model="search"
    placeholder="{{__($search_label)}}"
    class="w-auto shadow appearance-none border rounded-full  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
>