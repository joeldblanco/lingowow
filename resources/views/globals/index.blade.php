<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">

                <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                    <thead>
                        <tr class="flex text-md justify-around">
                            <th class="flex justify-center w-full">Key</th>
                            <th class="flex justify-center w-full">Value</th>
                            <th class="flex justify-center w-full"></th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4">

                        @foreach ($globals as $global)
                            <tr class="flex justify-around">
                                <td class="flex w-full justify-center uppercase">
                                    {{ $global->key }}</td>
                                <td class="flex w-full justify-center text-sm">{{ $global->value }}</td>
                                <td class="flex w-full justify-center">
                                    <a href="{{ route('globals.edit', $global->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
