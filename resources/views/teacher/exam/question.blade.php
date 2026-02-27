<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Question
        </h2>
    </x-slot>

 

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
                        <div class="p-6 text-gray-900 dark:text-gray-100">

 <form action="{{ route('exam.create-question')}}" method="POST" class="mt-6 space-y-6">
        @csrf
<div x-data="{ jenisSoalan: 'multiple' }" class="p-4 border rounded">

    <label class="block font-bold mb-2">Question Type:</label>
    <select  name="type" x-model="jenisSoalan" class="mb-4 p-2 border">
        <option value="multiple">Multiple Choice</option>
        <option value="open">Open Text / Essay</option>
    </select>
    <input type="hidden" name="exam_id" value="{{ $data->id }}">

    <x-input-label for="soalan" value="Soalan" />
    
    <textarea id="soalan" name="soalan" rows="4" 
        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        placeholder="Masukkan butiran di sini...">
        </textarea>
    

    <div x-show="jenisSoalan === 'multiple'" class="bg-blue-50 p-4 rounded">
        <p class="font-semibold text-blue-900">Masukkan Pilihan Jawapan & Tanda Jawapan Betul:</p>

    <div class="flex items-center gap-3">
        <input type="text" name="jawapan[A]" placeholder="Pilihan A" class="block w-full rounded-md border-gray-300">
        <label class="flex items-center cursor-pointer">
            <input type="radio" name="is_correct" value="A" class="w-5 h-5 text-green-600 focus:ring-green-500">
            <span class="ms-2 text-sm font-medium text-gray-700">Betul?</span>
        </label>
    </div>

    <div class="flex items-center gap-3">
        <input type="text" name="jawapan[B]" placeholder="Pilihan B" class="block w-full rounded-md border-gray-300">
        <label class="flex items-center cursor-pointer">
            <input type="radio" name="is_correct" value="B" class="w-5 h-5 text-green-600 focus:ring-green-500">
            <span class="ms-2 text-sm font-medium text-gray-700">Betul?</span>
        </label>
    </div>
    </div>



    
                    <div class="flex-row-reverse flex mt-2 items-center gap-4">
<button type="submit" class="btn btn-blue px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
    Add Question
</button>                    </div>
</div>

</form>



  <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">Existed Question</h2>
                </header>

                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Soalan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data->questions as $datas)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">Soalan {{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">
                        {{ $datas->type }}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




    </div>
    </div>
    </div>

    
    </div>
</x-app-layout>
