<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @include('layouts.breadcump')

        </h2>

        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <section class="p-6 dark:bg-coolGray-800 dark:text-white">
            <form method="POST" novalidate="" action="{{route('memo.store')}}"
                  class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                @csrf

                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">

                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                        <div class="col-span-full sm:col-span-3">
                            <label for="username" class="text-sm">Titolo</label>
                            <input value="{{old('title')}}"
                                   name="title" id="username" type="text"
                                   placeholder="Titolo"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-black">
                        </div>

                        <div class="col-span-full">
                            <label for="bio" class="text-sm">Descrizione</label>
                            <textarea
                                      name="description" id="bio"
                                      placeholder="Descrizione"
                                      rows="10"
                                      class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-black">{{old('description')}}</textarea>
                        </div>
<div class="col-span-full">
                        <button type="submit"
                                class="px-8 py-3 font-semibold border rounded dark:border-coolGray-100 dark:text-coolGray-100">
                            Crea
                        </button>
</div>
                    </div>
                </fieldset>

            </form>

        </section>



    </x-slot>
</x-app-layout>

