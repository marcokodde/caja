<x-jet-button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-1 rounded-full">
    @if(App::isLocale('en'))
        <a href="/language/es">{{__('Spanish')}}</a>
    @else
        <a href="/language/en">{{__('English')}}</a>
    @endif

</x-jet-button>
