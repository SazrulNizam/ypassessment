<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div x-data="{ jenisSoalan: 'multiple' }" class="p-4 border rounded">

    <label class="block font-bold mb-2">Jenis Soalan:</label>
    <select x-model="jenisSoalan" class="mb-4 p-2 border">
        <option value="multiple">Multiple Choice</option>
        <option value="open">Open Text / Essay</option>
    </select>

    <div x-show="jenisSoalan === 'multiple'" class="bg-blue-50 p-4 rounded">
        <p class="font-semibold">Masukkan Pilihan Jawapan:</p>
        <input type="text" name="options[]" placeholder="Pilihan A" class="block w-full mt-2">
        <input type="text" name="options[]" placeholder="Pilihan B" class="block w-full mt-2">
    </div>

    <div x-show="jenisSoalan === 'open'" class="bg-green-50 p-4 rounded">
        <p class="font-semibold">Ruangan Jawapan Pelajar:</p>
        <textarea disabled class="w-full bg-gray-100" placeholder="Pelajar akan taip jawapan di sini..."></textarea>
    </div>
</div>
{{-- button alert --}}
<div x-data="{ open: false }">
    <button @click="alert('Alpine Dah Hidup!')" class="p-2 bg-blue-500 text-white">
        Test Alert
    </button>
</div>

{{-- test add question --}}
<div x-data="{ questions: ['Soalan 1'] }" class="p-5 border">
    <h2 class="font-bold">Test Dynamic Questions</h2>
    
    <button type="button" @click="questions.push('Soalan Baru')" class="bg-blue-500 text-white p-2 mb-4">
        + Klik Sini Tambah Soalan
    </button>

    <template x-for="(q, index) in questions" :key="index">
        <div class="p-2 border mt-2 bg-gray-50">
            <span x-text="index + 1"></span>. 
            <input type="text" :value="q" class="border p-1">
        </div>
    </template>
</div>
</x-app-layout>
