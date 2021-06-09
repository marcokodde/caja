    <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Show')}}</label>
    <select wire:model="per_page" 
            id="per_page" 
            name="per_page" 
            class="w-24 bg-white border rounded-b-lg border-white-200 text-gray-700 py-1 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline mx-1">
        @for($i=5;$i<=25;$i+=5)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Records')}}</label>
