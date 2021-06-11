<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center max-w-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity">
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
          <div class="inline-block mx-auto max-w-screen-lg h-full bg-white rounded-lg overflow-hidden transform pt-5 mx-5 mb-4 px-2"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline">
              <form>
                <div class="bg-white px-2 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/3 px-2 mb-6 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("First Name")}}</label>
                            <input type="text" wire:model="first_name" maxlength="50" placeholder="{{__("First Name")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                            @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Middle Name")}}</label>
                            <input type="text" wire:model="middle_name" name="middle_name" placeholder="{{__("Middle Name")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('middle_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-6 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Last Name")}}</label>
                            <input type="text" wire:model="last_name" minlength="2" maxlength="50" placeholder="{{__("Last Name")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Maternal Name")}}</label>
                            <input type="text" wire:model="maternal_name" name="middle_name" placeholder="{{__("Maternal Name")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('maternal_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                      <div class="flex flex-wrap -mx-3 mb-3"> 
                        <div class="w-full md:w-1/3 px-2 mb-2 md:mb-0">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Address")}}</label>
                            <input type="text" wire:model="address" required maxlength="30" placeholder="{{__("Address")}}" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 
                            leading-tight focus:outline-none focus:shadow-outline">
                            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-2 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold" for="phone">
                                {{__("Phone")}}</label>
                            <input type="text" min="7" max="15" wire:model="phone" placeholder="{{__("Phone")}}" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 
                            leading-tight focus:outline-none focus:shadow-outline">
                            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-0">
                            <label  class="block text-gray-700 text-sm font-bold">{{__("Email")}}</label>
                            <input type="text" wire:model="email" required maxlength="30" placeholder="{{__("Email")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/4 px-3">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Country")}}</label>
                                <select class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="country_id"
                                >
                                <option class="bg-white-200">{{__('Country')}}</option>
                                @foreach($countries as $record)
                                    <option value="{{$record->id}}">{{$record->country}}</option>
                                @endforeach
                                </select>
                                @error('country_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                     </div>
                      <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/5 px-3 mb-2 md:mb-0">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="occupation_id">
                                {{__("Occupation")}}</label>
                                <input type="text" minlength="7" wire:model="occupation_id" maxlength="15" placeholder="{{__("Ocupacion")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline">
                                @error('occupation_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                            <label class=" tracking-wide text-black text-xs font-bold mb-2" for="birthday">
                                {{__("Birthdate")}}</label>
                              <input type="date"required max=<?php $hoy = $fecha->subYears(18)->format("Y-m-d"); echo $hoy;?> min="1920-11-09" wire:model="birthday" placeholder="{{__("Birthdate")}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                              @error('birthday') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/5 px-3 mb-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Photo")}}</label>
                            <input type="file" wire:model="photox" id="selecphoto" accept="image/*" >
                            @if($photo)
                                <img class="h-8 w-8 rounded-full object-cover" src="{{Storage::url($photo)}}" />
                            @else
                                <img id="Previewphoto" class="h-8 w-8 rounded-full object-cover">
                            @endif
                            @error('photox') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Zipcode")}}</label>
                                <input type="text" wire:model="zipcode" placeholder="{{__("Zipcode")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('zipcode') <span class="text-red-500">{{ $message }}</span>@enderror
                                
                            </div>
                            <div class="w-full md:w-1/2 px-2 mb-3 md:mb-0">
                                @if($vips)
                                    <label class=" tracking-wide text-black text-xs font-bold mb-2" for="vip_id">
                                        {{__("Vip")}}</label>
                                    <input type="text" minlength="7" wire:model="vip_id" maxlength="15" placeholder="{{__("Vip")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline">    
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr class="border-solid border-2 border-light-blue-500">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/5 px-3 mb-2">
                            <label class="tracking-wide text-black text-xs font-bold">
                                {{__("Identification")}}</label>
                               <input type="text" minlength="7" wire:model="identification_id" maxlength="15" placeholder="{{__("Identificacion")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline">
                                @error('identification_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/5 px-2 mb-2 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold" for="folio">
                                {{__("Folio")}}</label>
                            <input type="text" minlength="7" maxlength="15" wire:model="folio" placeholder="{{__("Folio")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline">
                            @error('folio') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/5 px-2 mb-2">
                            <label class="tracking-wide text-black text-xs font-bold">{{__("Expire At")}}</label>
                            <input type="date" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>  wire:model="expire_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                            @error('expire_at') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/5 px-3 mb-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Image")}}</label>
                            <input type="file" wire:model="imagenx" id="selecImage" accept="image/*">
                            @if($image)
                                <img class="h-8 w-8 rounded-full object-cover" src="{{Storage::url($image)}}" />
                            @else
                                <img id="imagenPrev" class="h-8 w-8 rounded-full object-cover">
                            @endif
                            @error('imagenx') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class=" block bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="active" class="opacity-0 absolute" checked>
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Active")}}
                        </label>
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class="block block bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="marked" class="opacity-0 absolute" checked>
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Marked")}}
                        </label>
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class="block bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="black_list" class="opacity-0 absolute" checked>
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Black list")}}
                        </label>
                    </div>
                    @include('common.crud_save_cancel')
              </form>
          </div>
    </div>
  </div>
<script>
// Obtener referencia al input y a la imagen

const $selecphoto = document.querySelector("#selecphoto"),
  $Previewphoto = document.querySelector("#Previewphoto");

// Escuchar cuando cambie
$selecphoto.addEventListener("click", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $selecphoto.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $Previewphoto.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $Previewphoto.src = objectURL;
});
 //Imagenes 2

 // Obtener referencia al input y a la imagen

const $selecImage = document.querySelector("#selecImage"),
  $imagenPrev = document.querySelector("#imagenPrev");

// Escuchar cuando cambie
$selecImage.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $selecImage.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrev.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrev.src = objectURL;
});
</script>