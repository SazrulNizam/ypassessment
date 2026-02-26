<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Edit Class</h2>
                </header>

                <form action="{{ route('class.edit', $data->id)}}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" value="Nama Kelas" />
                        <x-text-input id="name" name="name" value="{{$data->name}}" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Confirm</x-primary-button>
                    </div>
                </form>
            </div>

        
    </div>
</x-app-layout>