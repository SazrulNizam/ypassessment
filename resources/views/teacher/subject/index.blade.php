<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Class</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Add New Class</h2>
                </header>

                <form action="{{ route('subject.create')}}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Nama Kelas" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">Existed Class</h2>
                </header>

                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data as $datas)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{$datas->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{route('subject.show', $datas->id)}}" class="text-blue-600 hover:underline">Edit</a> | 
                                <form action="{{ route('subject.delete', $datas->id)}}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Padam</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>