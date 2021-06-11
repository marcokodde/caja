@include('common.crud_header')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div>
                <div id='calendar-container' wire:ignore>
                <div id='calendar'>
                    Calendario 2021
                </div>
                </div>
            </div>
            <!--Modal -->
            <button id="moda" class="px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-500 border border-transparent rounded-md active:bg-blue-700 focus:outline-none focus:shadow-outline-blue hover:bg-blue-700">
                Launch
            </button>
            <div class="hidden" id="modal">
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                
                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div  class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" 
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                                        <input type="date" wire:model="date_reserve" maxlength="50" placeholder="{{__("Fecha")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                                        @error('date_reserve') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Hora (24hrs)</label>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Hora Inicio:</label>
                                            <input type="time"  max=<?php $hoy = $fecha->subYears(18)->format("Y-m-d"); echo $hoy;?> min="1920-11-09" wire:model="start" placeholder="{{__("Initial")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            @error('start') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="w-full md:w-1/2">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Hora Final:</label>
                                            <input type="time" required max=<?php $hoy = $fecha->subYears(18)->format("Y-m-d"); echo $hoy;?> min="1920-11-09" wire:model="end" placeholder="{{__("Final")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            @error('end') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo:</label>
                                            <input type="text" wire:model="full_name" maxlength="50" placeholder="{{__("Name")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                                            @error('full_name') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-full md:w-1/2">
                                            <label class="block text-gray-700 text-sm font-bold">Direccion:</label>
                                            <input type="text" wire:model="address" required maxlength="30" placeholder="{{__("Address")}}" 
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 
                                            leading-tight focus:outline-none focus:shadow-outline">
                                            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    
                                        <div class="w-full md:w-1/2">
                                            <label  class="block text-gray-700 text-sm font-bold">{{__("Email")}}</label>
                                            <input type="text" wire:model="email" required maxlength="30" placeholder="{{__("Email")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2">
                                            <label class="block text-gray-700 text-sm font-bold">Telefono:</label>
                                            <input type="text" min="7" max="15" wire:model="phone" placeholder="{{__("Phone")}}" 
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 
                                            leading-tight focus:outline-none focus:shadow-outline">
                                            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    
                                        <div class="w-full md:w-1/2">
                                            <label class="block text-gray-700 text-sm font-bold">Negocio:</label>
                                            <input type="text" minlength="7" wire:model="negocio" maxlength="15" placeholder="{{__("Negocio")}}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                                            leading-tight focus:outline-none focus:shadow-outline">
                                                @error('negocio') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button  type="button" class="inline-flex justify-center w-full rounded-md border border-blue-500 px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Save
                                        </button>
                                    </span>
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        <button  type="button" wire:click='closeModal()'class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>