<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @include('layouts.breadcump')

        </h2>


        <div class="dark:text-white px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">

                <h2 class="dark:text-white max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor"
             class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="db164e35-2a0e-4c0f-ab05-f14edc6d4d30" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7"></circle>
            </pattern>
          </defs>
          <rect fill="url(#db164e35-2a0e-4c0f-ab05-f14edc6d4d30)" width="52" height="24"></rect>
        </svg>
      </span class="dark:text-white">
                    Autore: {{Auth()->user()->name}}
                </h2>
                <p class="dark:text-white">Memo aggiornata il: {{$memo->updated_at}}</p>
            </div>
            <div class="grid max-w-sm gap-5 mb-8 lg:grid-cols-1 sm:mx-auto lg:max-w-full">
                <div class="px-10 py-20 text-center border rounded lg:px-5 lg:py-10 xl:py-20">
                    <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase">
                        Creata il: {{$memo->created_at}}
                    </p>
                    <a href="#"
                       class="dark:text-red-700 inline-block max-w-xs mx-auto mb-3 text-2xl font-extrabold leading-7 transition-colors duration-200 hover:text-deep-purple-accent-400"
                       aria-label="Read article" title="Nori grape silver beet broccoli kombu beet">
                        {{ucwords($memo->title)}}
                    </a>
                    <p class="dark:text-white max-w-xs mx-auto mb-2 text-gray-700">
                        {{$memo->description}}
                    </p>
                    <div class="mt-3">
                    <a href="{{route('memo.edit', ['memo' => $memo->id])}}" aria-label=""
                       class="dark:text-white inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Modifica
                    </a>

                    <form method="POST" class="d-inline-block"
                          action="{{route('memo.destroy', ['memo' => $memo->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-1.5">
                            Elimina
                        </button>
                    </form>
                        </div>
                </div>

            </div>
        </div>


    </x-slot>
</x-app-layout>
