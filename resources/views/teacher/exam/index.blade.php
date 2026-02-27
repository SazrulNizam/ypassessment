<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class : {{$data->name}}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
     @if(auth()->user()->role == 'lecturer')
       
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Add Exam</h2>
                </header>

                <form action="{{ route('exam.create')}}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                     <input type="hidden" name="classroom_id" value="{{ $data->id }}">

                         <x-input-label for="subject_id" value="Subject" />
    
                <select id="subject_id" name="subject_id" 
        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        
        <option value="" disabled selected>-- Please Choose --</option>
        
        @foreach($subjects as $data)
            <option value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
        
    </select>
    
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>
@endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">Existed Exam</h2>
                </header>

                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Exam Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject Name</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($exam as $datas)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{$datas->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{$datas->subject->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                 @if(auth()->user()->role == 'lecturer')

                                <a href="{{ route('exam.question', $datas->id) }}" class="text-blue-600 hover:underline">Add Question</a>  
                                @else
                                @if($datas->student_answers->isEmpty())
                             <a href="{{ route('student.index', $datas->id) }}" class="text-blue-600 hover:underline">Attend</a>  
                                @else
                             <span class="text-gray-400 cursor-not-allowed italic">Already Attended</span>
                                @endif

                               @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>