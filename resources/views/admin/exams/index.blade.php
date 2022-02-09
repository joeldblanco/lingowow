<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <a href="{{route('exam.store')}}" class="p-2 m-2 block border w-20 text-center rounded-md bg-gray-200 font-semibold hover:bg-gray-500 hover:text-white">
                    New
                </a>
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">ID</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Unit</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Status</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Created at</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($exams))
                        @foreach ($exams as $exam)
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b border-gray-400">{{$exam->id}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{{$exam->unit_id}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">@if($exam->deleted_at == NULL) Active @else Inactive @endif</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{{$exam->created_at->isoFormat('L')}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{route('exam.show',$exam->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{route('exam.edit',$exam->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-400"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center">There are no exams</td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>