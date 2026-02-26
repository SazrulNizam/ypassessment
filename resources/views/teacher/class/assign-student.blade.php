<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit</h2>
    </x-slot>

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8 border-b pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Manage Students</h1>
                <p class="mt-2 text-sm text-gray-600">Classroom: <span class="font-bold text-blue-600">{{ $assigned->name }}</span></p>
            </div>
            <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-gray-700">← Kembali</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center">
                        <span class="w-2 h-6 bg-yellow-400 rounded-full mr-3"></span>
                        Available Students
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @forelse($availableUser as $user)
                            <div class="group flex justify-between items-center p-4 bg-gray-50 rounded-xl hover:bg-yellow-50 transition-all duration-200 border border-transparent hover:border-yellow-200">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-700 font-bold mr-3">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="font-medium text-gray-700">{{ $user->name }}</span>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-yellow-500 hover:text-white hover:border-yellow-500 transition-colors shadow-sm">
                                        Add +
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-gray-400 italic">Tiada pelajar tersedia untuk ditambah.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-blue-600 px-6 py-4 border-b border-blue-700">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <span class="w-2 h-6 bg-white/30 rounded-full mr-3"></span>
                        Assigned to Class
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @forelse($assigned->user as $user) {{-- Guna 'user' ikut nama function model anda --}}
                            <div class="flex justify-between items-center p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold mr-3">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="font-medium text-blue-900">{{ $user->name }}</span>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="text-blue-400 hover:text-red-600 p-2 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-gray-400 italic">Belum ada pelajar didaftarkan dalam kelas ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>