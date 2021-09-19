<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buyers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('buyers.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 mb-2">{{ __('Añadir nuevo') }}</a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="relative py-3 pl-4 pr-10 leading-normal text-{{ session('color') }}-700 bg-{{ session('color') }}-100 rounded-lg"
                role="alert">
                <p>{{ session('message') }}</p>
                <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
                <div class="overflow-x-auto">
                    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">#Id</th>
                                            <th class="py-3 px-6 text-left">NIF</th>
                                            <th class="py-3 px-6 text-center">Nombre</th>
                                            <th class="py-3 px-6 text-center">Correo</th>
                                            <th class="py-3 px-6 text-center">Fecha de creación</th>
                                            <th class="py-3 px-6 text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @foreach ($buyers as $buyer)
                                        
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $buyer->id }}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    {{ $buyer->nif }}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex items-center justify-center">
                                                    {{$buyer->name}}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex items-center justify-center">
                                                    {{$buyer->email}}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $buyer->created_at }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </div>
                                                    {{-- Editar--}}
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a href="{{route('buyers.edit', ['buyer' => $buyer->id])}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    {{-- Eliminar--}}
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <form method="POST" action="{{ route('buyers.destroy', ['buyer' => $buyer->id]) }}">
                                                            @csrf
                                                            {{ method_field("DELETE") }}
                                                            <a href="{{ route('buyers.destroy', ['buyer' => $buyer->id]) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </a>
                                                        </form>
                                                       
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $buyers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>