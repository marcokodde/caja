@include('common.crud_header')
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="flex">
                <x-index title="Cambio de Cheques">
                    <button wire:click="check">
                        <span>Cambio de Cheques
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                    </span>
                    </button>
                </x-index>

                <x-index title="Copias Y Fax">      
                    <button wire:click="copies">
                        <span>Copias y Fax</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </button>
                </x-index>

                <x-index title="Envios De Dinero">
                    <button wire:click="envio">
                        <span>Envios de Dinero</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                </x-index>
                
               
                <x-index title="Money Order">
                    <button  wire:click="money">
                        <span>Money Order</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    </button>
                </x-index>

                <x-index title="Pago de Servicios">
                    <button  wire:click="pago">
                        <span>Pago de Servicios</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                </x-index>

                <x-index title="Pagos a Clientes">
                    <button  wire:click="nuevo">
                        <span>Pagos a Clientes</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </button>
                </x-index>

                <x-index title="Recargas de Celulares">
                    <button wire:click="nuevo">
                        <span>Recargas de Celulares</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                    </button>
                </x-index>

                <x-index title="Recarga de Tarjetas">
                    <button  wire:click="nuevo">
                        <span>Recarga de Tarjetas</span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </button>
                </x-index>

                <x-index title="Ventas">
                    <button wire:click="nuevo">
                        <span>&nbsp&nbsp&nbsp&nbspVentas&nbsp&nbsp&nbsp&nbsp </span>
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </button>
                </x-index>
            </div>
        
 
<!--Section formato clientes -->
    <section class="text-gray-700 body-font">
        <div class="container px-10 pt-20 pb-24 mx-auto lg:px-6">
            <div class="flex flex-col w-full text-left lg:text-center">
                <div class="flex flex-wrap text-left pt-10">
                    <div class="px-8 py-6 lg:w-1/4 md:w-full">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-12 h-12 mb-5 text-blue-800 bg-gray-200 rounded-full">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM11 13H4v6h7v-6zm9 0h-7v6h7v-6zm-9-8H4v6h7V5zm9 0h-7v6h7V5z" />
                        </svg>
                    </div>
                   
                </div>
                <div class="px-8 py-6 lg:w-1/4 md:w-full">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-12 h-12 mb-5 text-blue-800 bg-gray-200 rounded-full">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M14 10h-4v4h4v-4zm2 0v4h3v-4h-3zm-2 9v-3h-4v3h4zm2 0h3v-3h-3v3zM14 5h-4v3h4V5zm2 0v3h3V5h-3zm-8 5H5v4h3v-4zm0 9v-3H5v3h3zM8 5H5v3h3V5zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" />
                        </svg>
                    </div>
                    <h2 class="mb-3 text-lg font-medium text-gray-700 title-font">Information 4</h2>
                    <p class="mb-4 text-base leading-relaxed">Fingerstache flexitarian street art 8-bit waistcoat.
                    Distillery
                    hexagon disrupt edison bulbche.</p>
            
                </div>
            </div>
        </div>
    </section>

   
   <section class="text-gray-700 body-font">
    <div class="container px-8 pt-8 mx-auto lg:px-48">
     <div class="flex flex-col w-full mb-12 text-left lg:text-center">
     
     </div>
     <div class="flex flex-wrap ">
      <div class="px-8 py-6 mx-auto lg:px-10 lg:w-1/2 md:w-auto ">
       <div class="h-full px-4 py-6 border rounded-xl">
        <svg class="w-10 h-10 mb-4 ml-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="34" height="24" fill="currentColor">
         <path fill="none" d="M0 0h24v24H0z" />
         <path d="M5.68 7.314l-1.82 5.914L12 19.442l8.14-6.214-1.82-5.914L16.643 11H7.356L5.681 7.314zM15.357 9l2.888-6.354a.4.4 0 0 1 .747.048l3.367 10.945a.5.5 0 0 1-.174.544L12 21.958 1.816 14.183a.5.5 0 0 1-.174-.544L5.009 2.694a.4.4 0 0 1 .747-.048L8.644 9h6.712z" />
        </svg>
        <h2 class="flex items-center justify-start mt-2 mb-4 text-3xl font-bold leading-none text-left text-blue-800 lg:text-6xl">
            $38
            <span class="ml-1 text-base text-gray-600">/mo</span>
           </h2>
           <p class="mb-4 text-base leading-relaxed">Tailwind CSS templates
            with a wicked design.
            Professionally designed and 100% responsive static templates for startups and personal
            use.</p>
           <p class="flex items-center mb-2 text-gray-600">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"></path>
             </svg>
            </span>Feature 1
           </p>
           <p class="flex items-center mb-2 text-gray-600">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"></path>
             </svg>
            </span>Feature 2
           </p>
           <p class="flex items-center mb-6 text-gray-600">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
             <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"></path>
             </svg>
            </span>Feature 3
           </p>
        <button class="items-end w-full px-8 py-2 mt-12 font-semibold text-black transition duration-500 ease-in-out transform bg-white border rounded-lg shadow-xl hover:text-white focus:shadow-outline focus:outline-none hover:bg-black hoveer:border-black">
         Action
        </button>
       </div>
      </div>
      <div class="px-8 py-6 mx-auto lg:px-10 lg:w-1/2 md:w-auto">
       <div class="h-full px-4 py-6 border rounded-xl">
        <svg class="w-10 h-10 mb-4 ml-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
         <path fill="none" d="M0 0h24v24H0z" />
         <path d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM11 13H4v6h7v-6zm9 0h-7v6h7v-6zm-9-8H4v6h7V5zm9 0h-7v6h7V5z" />
        </svg>
        <h3 class="tracking-widest">PRO</h3>
        <h2 class="flex items-center justify-start mt-2 mb-4 text-3xl font-bold leading-none text-left text-blue-800 lg:text-6xl">
         $38
         <span class="ml-1 text-base text-gray-600">/mo</span>
        </h2>
        <p class="mb-4 text-base leading-relaxed">Tailwind CSS templates
         with a wicked design.
         Professionally designed and 100% responsive static templates for startups and personal
         use.</p>
        <p class="flex items-center mb-2 text-gray-600">
         <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
           <path d="M20 6L9 17l-5-5"></path>
          </svg>
         </span>Feature 1
        </p>
        <p class="flex items-center mb-2 text-gray-600">
         <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
           <path d="M20 6L9 17l-5-5"></path>
          </svg>
         </span>Feature 2
        </p>
        <p class="flex items-center mb-6 text-gray-600">
         <span class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-gray-500 rounded-full">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
           <path d="M20 6L9 17l-5-5"></path>
          </svg>
         </span>Feature 3
        </p>
        <button class="w-full px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:shadow-outline focus:outline-none">Button</button>
       </div>
      </div>
     </div>
    </div>
   </section>
</div>
</div>