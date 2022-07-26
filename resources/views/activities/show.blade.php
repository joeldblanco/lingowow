<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                @php $data = json_decode($activity->data); @endphp

                {{dd($data)}}

                <p>{{$data->text}}</p>
                {{-- <p>{{$data->}}</p> --}}

            </div>
        </div>
    </div>
</x-app-layout>
