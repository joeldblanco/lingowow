<x-app-layout>
    <div class="bg-white rounded-lg w-full max-w-full overflow-x-auto">
        <div class="my-5 pl-5">
            <p class="text-xl font-bold w-full text-left">
                Recordings
            </p>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b border-t">
                    <th class="pl-6 py-4 text-left">Start Date (Local)</th>
                    <th class="pl-6 py-4 text-left">Duration</th>
                    <th class="pl-6 py-4 text-left">Play Url</th>
                    <th class="pl-6 py-4 text-left">Chat</th>
                    <th class="pl-6 py-4 text-left">Password</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allRecordings as $files)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">
                            @php
                                $recordingDate = (new Carbon\Carbon($files[0]['recording_start']))->setTimezone(auth()->user()->timezone);
                            @endphp
                            {{ $recordingDate->format('d/m/Y - h:00 a') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-left">
                            {{ $files[0]['duration'] }} min.</td>
                        <td class="px-6 py-4 text-sm text-left">
                            <a href="{{ $files[0]['play_url'] }}" target="_blank"
                                class="hover:text-lw-blue hover:font-bold hover:underline">{{ Str::limit($files[0]['play_url'], 45, '...') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-center">
                            @if (!empty($files[1]))
                                <a href="{{ $files[1]['download_url'] }}">
                                    <i class="fas fa-file-download text-xl text-gray-500 hover:text-gray-600"></i>
                                </a>
                            @else
                                <i class="fas fa-file-download text-xl cursor-not-allowed text-gray-200"></i>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a id="texto-a-copiar" href="#" class="text-gray-600 hover:text-black font-bold"
                                alt="Copy to clipboard" onclick="copiarTexto(); return false;">
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
