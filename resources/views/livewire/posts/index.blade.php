<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Posts...
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
            <div class="flex">
					<x-index title="Depositos">
					    <button class="rounded-lg" wire:click="nuevo">
                            <span>Envio De Dinero</span> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/unipago.png') }}"> {{$title}}
    				    </button>
                    </x-index>
                    
					<x-index title="Depositos">
					    <button class="rounded-lg" wire:click="nuevo">
                            <label>Cambio de Cheques</label> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/coppel.png') }}" width="90" height="90" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
					    <button class="rounded-lg" wire:click="nuevo">
                            <label>Copias and Fax</label> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/barri.jpg') }}" width="250" Height="90" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
                        <span>Envio De Dinero</span> 
					    <button class="rounded-lg" wire:click="nuevo"> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/elektra.jpeg') }}" width="100" height="100" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
                        <span>Money Order</span> 
					    <button class="rounded-lg" wire:click="nuevo"> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/emagi.png') }}" width="150" height="150" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
                        <span>Recargas Celular/span> 
					    <button class="rounded-lg" wire:click="nuevo"> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/unipago.png') }}" width="100" height="100" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
                        <span>Recargas Telefonicas</span> 
					    <button class="rounded-lg" wire:click="nuevo"> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/unipago.png') }}" width="100" height="100" > {{$title}}
    				    </button>
                    </x-index>

                    <x-index title="Depositos">
                        <span>Pagos de Servicios</span> 
					    <button class="rounded-lg" wire:click="nuevo"> 
    					    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset('img/unipago.png') }}" width="100" height="100" > {{$title}}
    				    </button>
                    </x-index>
	            </div>
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</button>
            
            @if($isOpen)
                @include('livewire.posts.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Body</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ $post->body }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="select({{ $post->id }})" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Select</button>
                        <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
           
        </div>
    </div>
</div>