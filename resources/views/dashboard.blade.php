<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-3 gap-4">

                        @forelse($classes as $data)

                        <a href="{{route('exam.index', $data->id)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Class: {{$data->name}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Student: {{ $data->user_count ?? 0 }}</p>
                            <div class="mt-4">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">Aktif</span>
                            </div>
                        </a>
                        @empty
                        <div class="text-center py-8">
                            @if(auth()->user()->role == 'lecturer')

                            <p class="text-gray-400 italic">No classes created yet</p>
                            @endif
                            <p class="text-gray-400 italic">No classes assigned yet</p>

                        </div>
                        @endforelse

                    </div>


                </div>
            </div>
        </div>


    </div>
</x-app-layout>
