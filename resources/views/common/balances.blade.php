<div>
    @if($show_normal_register)
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Register')}}: {{session('register_normal')->register}}</label>
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Min')}}: {{session('balance_min_normal')}}</label>
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Max')}}: {{session('balance_max_normal')}}</label>
        @if(session('balance_normal') < session('balance_min_normal') || session('balance_normal') > session('balance_max_normal'))
            <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-white bg-red-700">
            {{__('Balance')}}: {{session('balance_normal')}}</label>
        @else
            <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-black bg-green-500">
                {{__('Balance')}}: {{session('balance_normal')}}
            </label>
        @endif
    @else
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Register')}}: {{session('register_safe')->register}}</label>
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Min')}}: {{session('balance_min_safe')}}</label>
        <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">{{__('Max')}}: {{session('balance_max_safe')}}</label>
        @if(session('balance_safe') < session('balance_min_safe') || session('balance_safe') > session('balance_max_safe'))
            <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-white bg-red-700">
            {{__('Balance')}}: {{session('balance_safe')}}</label>
        @else
            <label class="px-1 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-black bg-green-500">
                {{__('Balance')}}: {{session('balance_safe')}}
            </label>
        @endif
    @endif
    @if ($show_button_alternate)
        <button wire:click="toggle_show_register" class="ml-10 bg-gray-400 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
            @if($show_normal_register)
                {{__("Safe")}}
            @else
                {{__("Normal")}}
            @endif
        </button>
    @endif
</div>
