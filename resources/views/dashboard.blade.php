<x-app-layout>

    <div class="py-12 bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">

                {{Str::random(16)}}

                @if (Auth::user()->roles->pluck('name')[0] == 'student')
                    <div>
                        <a href="{{route('classroom')}}" class="inline-block bg-blue-800 text-white px-6 py-4 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Classroom</a>
                    </div>
                @endif

                <livewire:scheduled-calendar />
            </div>
        </div>
    </div>

</x-app-layout>