<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
         @include('layouts.breadcump')
      </h2>
   </x-slot>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <div
                  class="dark:text-white dark:bg-dmode px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                     <div class="mb-10">
                     
                        @include('layouts.search')
                        
                     </div>
                     <div>
                        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                           Benvenuto
                           <strong>
                        <h3>{{Auth()->user()->name}}</h3></strong>
                        </p>
                     </div>
                     <h2 class="dark:text-white max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                        <span class="relative inline-block">
                           <svg viewBox="0 0 52 24" fill="currentColor"
                              class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                              <defs>
                                 <pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0" width=".135" height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                 </pattern>
                              </defs>
                              <rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="52" height="24"></rect>
                           </svg>
                        </span>
                        Controlla ed organizza i tuoi memo
                     </h2>
                     <a href="{{route('memo.create')}}" type="button" class="px-8 py-3 font-semibold border rounded dark:border-coolGray-100 dark:text-white">Crea</a>
                  </div>
                  <div class="grid gap-8 row-gap-5 md:row-gap-8 lg:grid-cols-3">
                     @forelse($memos as $memo)
                     <a href="{{route('memo.show', ['memo' => $memo->id])}}">
                        <div
                           class="dark:text-black p-5 duration-300 transform bg-white border-2 border-dashed rounded shadow-sm border-deep-purple-accent-100 hover:-translate-y-2">
                           <div class="flex items-center mb-2">
                              <p class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-white rounded-full bg-deep-purple-accent-400">
                                 1
                              </p>
                              <p class="text-lg font-bold leading-5">{{ ucwords($memo->title) }}</p>
                           </div>
                           <p class="text-sm text-gray-900">
                              {{ Str::limit($memo->description, 100) }}
                           </p>
                        </div>
                     </a>
                     @empty
                     <p>Nessun memo trovato</p>
                     @endforelse
                  </div>
               </div>
                <div class="gap-8 row-gap-5 md:row-gap-8 lg:grid-cols-12 mt-3">
                    {{$memos->links()}}
                </div>

            </div>
         </div>
      </div>
   </div>


</x-app-layout>
