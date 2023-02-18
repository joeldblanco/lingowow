<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="bg-white w-full border border-gray-300 rounded-lg p-6 divide-y divide-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="font-bold text-2xl">
                            Recordings
                        </p>
                    </div>
                    <div class="pt-6 w-full">
                        <table class="table-auto text-left w-full border-collapse">
                            <thead>
                                <tr class="text-headcenter">
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-thegray-600 border-b border-gray-400 text-center">
                                        Start Date (Local)</th>
                                    <th
                                        class="thepy-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Duration</th>
                                    <th
                                        class="thepy-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Play Url</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Chat</th>
                                    <th
                                        class="py-4 pxthe-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allRecordings as $files)
                                    <tr class="text-center">
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            @php
                                                $recordingDate = (new Carbon\Carbon($files[0]['recording_start']))->setTimezone(auth()->user()->timezone);
                                            @endphp
                                            {{ $recordingDate->format('d/m/Y - h:00 a') }}
                                        </td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            {{ $files[0]['duration'] }} min.</td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <a href="{{ $files[0]['play_url'] }}" target="_blank"
                                                class="hover:text-lw-blue hover:font-bold hover:underline">{{ Str::limit($files[0]['play_url'], 45, '...') }}
                                            </a>
                                        </td>
                                        @if (!empty($files[1]))
                                            <td class="py-4 px-6 border-b text-gray-600 border-gray-400 text-center">
                                                <a href="{{ $files[1]['download_url'] }}">
                                                    <i class="fas fa-file-download text-xl"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td class="py-4 px-6 border-b text-gray-300 border-gray-400 text-center">
                                                <i class="fas fa-file-download text-xl cursor-not-allowed"></i>
                                            </td>
                                        @endif
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <a id="texto-a-copiar" href="#"
                                                class="text-gray-600 hover:text-black font-bold" alt="Copy to clipboard"
                                                onclick="copiarTexto(); return false;">
                                                {{ $files[0]['password'] }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-3xl font-bold">
                                        <td colspan="5" class="text-center">
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
