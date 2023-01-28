<x-app-layout>
    <div class="w-full flex justify-center mt-4">
        @if (session()->exists('success'))
            <div class="rounded-md bg-green-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">{{ session('success') }}</p>
            </div>
        @endif
        @if (session()->exists('error'))
            <div class="rounded-md bg-red-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">Error creating feature! - {{ session('error')['message'] }}</p>
            </div>
        @endif
        @php
            session()->forget('success');
            session()->forget('error');
        @endphp
    </div>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="bg-white w-full border border-gray-300 rounded-lg p-6 divide-y divide-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="font-bold text-2xl">
                            Features
                        </p>
                        <p>
                            <a href="{{ route('features.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Feature
                            </a>
                        </p>
                    </div>
                    <div class="pt-6 w-full">
                        <table class="table-auto text-left w-full border-collapse">
                            <thead>
                                <tr class="text-center">
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Name</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Details</th>
                                    {{-- <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Atendee</th> --}}
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Details Url</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    </th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($features) <= 0)
                                    <tr class="text-3xl font-bold">
                                        <td colspan="4" class="text-center">
                                            <div class="py-20 text-red-500">No features found</div>
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($features as $feature)
                                    <tr class="text-center">
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">{{ $feature->name }}
                                        </td>
                                        @if ($feature->details != null)
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                {{ json_decode($feature->details)->content }}</td>
                                            @if (json_decode($feature->details)->link != 'null')
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <a href="{{ json_decode($feature->details)->link }}"
                                                        class="hover:text-blue-600 hover:underline" target="_blank">
                                                        {{ json_decode($feature->details)->link }}<span class="text-xs">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            @else
                                                <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                                            @endif
                                        @else
                                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                                        @endif
                                        {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            {{ $meeting->atendee->first_name }} {{ $meeting->atendee->last_name }}
                                        </td> --}}
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <a href="{{ route('features.edit', $feature->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 border-b border-gray-400 text-center">
                                            <form action="{{ route('features.destroy', $feature->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
