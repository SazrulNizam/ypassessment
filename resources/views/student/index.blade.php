<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$data->name}}
        </h2>
    </x-slot>



    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <form action="{{ route('exam.submit') }}" method="POST">
                        @csrf

                    <div x-data="{ 
        timeLeft: 20,
        formatTime(seconds) {
            let minit = Math.floor(seconds / 60);
            let saat = seconds % 60;
            return (minit < 10 ? '0' : '') + minit + ':' + (saat < 10 ? '0' : '') + saat;
        }
    }" x-init="setInterval(() => { 
        if (timeLeft > 0) timeLeft--;
        else $el.closest('form').submit(); 
    }, 1000)" class="p-4 mb-4 bg-red-100 border border-red-400 text-red-700 rounded">

                        Time Remaining: <span x-text="formatTime(timeLeft)" class="font-bold text-xl"></span>

                    </div>
                        <input type="hidden" name="exam_id" value="{{ $data->id }}">
                        <input type="hidden" name="classroom_id" value="{{ $data->classroom_id }}">

                        @foreach($data->questions as $question)
                        <div class="mt-8 border rounded">

                            <label class="block font-bold mb-2">Soalan :</label>
                            <p>{{$question->soalan}}</p>
                            <br>

                            @if($question->type === 'open')
                            <div class="bg-green-50 p-4 rounded">
                                <p class="font-semibold">Ruangan Jawapan Pelajar:</p>
                                <textarea name="answers[{{ $question->id }}]" class="w-full bg-gray-100" placeholder="Add Answer here..."></textarea>
                            </div>
                            @else
                            <x-input-label value="Pilihan Jawapan" />
                            <div class="flex items-center space-x-6 mt-2">

                                @foreach($question->questionlist as $list)
                                <div class="flex items-center">
                                    <input id="option_{{ $list->id }}" name="answers[{{ $question->id }}]" type="radio" value="{{$list->pilihan}}" name="answer" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="option_{{ $list->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$list->jawapan}}</label>
                                </div>
                                @endforeach

                            </div>
                            @endif
                        </div>
                        @endforeach



                        <div class="flex-row-reverse flex mt-2 items-center gap-4">
                            <button type="submit" class="btn btn-blue px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Submit
                            </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>


    </div>
</x-app-layout>
