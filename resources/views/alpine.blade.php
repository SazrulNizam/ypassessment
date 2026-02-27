<x-app-layout>
<div x-show="jenisSoalan === 'multiple'" class="bg-blue-50 p-4 rounded space-y-4">
    <p class="font-semibold text-blue-900">Masukkan Pilihan Jawapan & Tanda Jawapan Betul:</p>

    <div class="flex items-center gap-3">
        <input type="text" name="options[A]" placeholder="Pilihan A" class="block w-full rounded-md border-gray-300">
        <label class="flex items-center cursor-pointer">
            <input type="radio" name="correct_answer" value="A" class="w-5 h-5 text-green-600 focus:ring-green-500">
            <span class="ms-2 text-sm font-medium text-gray-700">Betul?</span>
        </label>
    </div>

    <div class="flex items-center gap-3">
        <input type="text" name="options[B]" placeholder="Pilihan B" class="block w-full rounded-md border-gray-300">
        <label class="flex items-center cursor-pointer">
            <input type="radio" name="correct_answer" value="B" class="w-5 h-5 text-green-600 focus:ring-green-500">
            <span class="ms-2 text-sm font-medium text-gray-700">Betul?</span>
        </label>
    </div>

    <x-input-error class="mt-2" :messages="$errors->get('correct_answer')" />
</div>

    <div x-show="jenisSoalan === 'open'" class="bg-green-50 p-4 rounded">
        <p class="font-semibold">Ruangan Jawapan Pelajar:</p>
        <textarea disabled class="w-full bg-gray-100" placeholder="Pelajar akan taip jawapan di sini..."></textarea>
    </div>
</div>

<div class="mt-8 border rounded">

    <label class="block font-bold mb-2">Soalan :</label>
   <p>Berapakah 1+2</p>

   <div class="bg-green-50 p-4 rounded">
        <p class="font-semibold">Ruangan Jawapan Pelajar:</p>
        <textarea class="w-full bg-gray-100" placeholder="Pelajar akan taip jawapan di sini..."></textarea>
    </div>

    <x-input-label value="Pilihan Jawapan" />
    
    <div class="flex items-center space-x-6 mt-2">
        <div class="flex items-center">
            <input id="option_a" type="radio" value="A" name="answer" 
                class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="option_a" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilihan A</label>
        </div>

        <div class="flex items-center">
            <input id="option_b" type="radio" value="B" name="answer" 
                class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="option_b" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilihan B</label>
        </div>
    </div>
</div>

</x-app-layout>