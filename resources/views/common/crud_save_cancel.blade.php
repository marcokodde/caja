<div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <button wire:click.prevent="store()" type="button" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-700 focus:outline-none focus:shadow-outline-blue hover:bg-blue-700">
            {{__('Save')}}
        </button>
    </span>

    <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button wire:click="closeModal()" {{$this->resetErrorBag()}} class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-500 focus:outline-none focus:shadow-outline-green hover:bg-green-500">
            {{__('Cancel')}}
        </button>
    </span>
</div>
