<x-app-layout>
    {{-- <div class="w-full flex justify-center mt-4">
        @if (session()->exists('success'))
            <div class="rounded-md bg-green-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">{{session('success')}}</p>
            </div>
        @endif
        @if (session()->exists('error'))
            <div class="rounded-md bg-red-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">Error creating meeting! - {{ session('error')['message'] }}</p>
            </div>
        @endif
        @php
            session()->forget('success');
            session()->forget('error');
        @endphp
    </div> --}}

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="bg-white w-full border border-gray-300 rounded-lg p-6 divide-y divide-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="font-bold text-2xl">
                            Recordings
                        </p>
                        {{-- <p>
                            <a href="{{ route('meetings.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Meeting
                            </a>
                        </p> --}}
                    </div>
                    <div class="pt-6 w-full">
                        <table class="table-auto text-left w-full border-collapse">
                            <thead>
                                <tr class="text-center">
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Start Date</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Duration</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Play Url</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recordings as $recording)
                                {{dd($recordings)}}
                                    <tr class="text-center">
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            {{ $recording['recording_start'] }}
                                        </td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            {{ $recording['duration'] }} min.</td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <a href="{{ $recording['play_url'] }}" target="_blank"
                                                class="hover:text-lw-blue hover:font-bold hover:underline">{{ Str::limit($recording['play_url'], 45, '...') }}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <a id="texto-a-copiar" href="#"
                                                class="text-gray-600 hover:text-black font-bold" alt="Copy to clipboard"
                                                onclick="copiarTexto(); return false;">
                                                {{ $recording['password'] }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-3xl font-bold">
                                        <td colspan="4" class="text-center">
                                            <div class="py-20 text-red-500">No recordings available.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        function copiarTexto() {
            // Selecciona el elemento con la ID "texto-a-copiar"
            var textoACopiar = document.querySelector('#texto-a-copiar');

            // Selecciona todo el texto del elemento
            var range = document.createRange();
            range.selectNode(textoACopiar);
            window.getSelection().addRange(range);

            // Copia el texto seleccionado al portapapeles
            document.execCommand('copy');

            // Quita la selección del texto
            window.getSelection().removeAllRanges();
        }
    </script>

</x-app-layout>
