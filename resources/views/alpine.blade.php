<x-app-layout>
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
</div></x-app-layout>