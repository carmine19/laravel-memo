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
            <form method="POST" novalidate="" action="{{route('memo.update', ['memo' => $memo->id])}}"
                  class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                @method('PUT')
                @csrf

                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <p class="font-medium"><strong>{{$memo->title}}</strong></p>
                        <p class="text-xs">Aggiornata il <strong>{{$memo->updated_at}}</strong></p>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                        <div class="col-span-full sm:col-span-3">
                            <label for="username" class="text-sm">Titolo</label>
                            <input value="{{old('title', $memo->title)}}"
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
                                      class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-black">{{old('description', $memo->description)}}
                            </textarea>
                        </div>
<div class="col-span-full">
                        <button type="submit"
                                class="px-8 py-3 font-semibold border rounded dark:border-coolGray-100 dark:text-coolGray-100">
                            Modifica
                        </button>
</div>
                    </div>
                </fieldset>

            </form>

        </section>



    </x-slot>
</x-app-layout>
