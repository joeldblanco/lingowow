<x-app-layout>

    <div class="p-4 bg-gray-200 font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <table class="flex m-auto w-3/4 justify-center border-collapse table-auto whitespace-no-wrap table-striped relative h-full">
                    {{-- <thead>
                        <tr class="text-left">
                            @foreach ($headings as $heading)
                            <th class="text-center cursor-pointer bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                {{$heading}}
                            </th>

                            @endforeach
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"></th>
                        </tr>
                    </thead> --}}
                    <tbody class="flex flex-col bg-white p-10 rounded-xl w-full" x-data>
                        @foreach ($notifications as $key => $value)
                        <tr class="@if($notification_read_at[$key]) text-gray-500 @else text-gray-700 font-bold @endif cursor-pointer space-x-3 flex justify-around items-center border-dashed border-b @if(!$loop->last) mb-5 @endif py-5" @click="$wire.showNotification('{{$notification_id[$key]}}')">
                            <td class="text-center border-gray-200 w-1/12">
                                <i class="{{$notification_icon[$key]}} text-4xl"></i>
                                {{-- {{$notification_id[$key]}} --}}
                            </td>
                            <td class="text-center border-gray-200 w-10/12">
                                <p>{{Str::limit($notification_data[$key], 100, '...')}}</p>
                                <div class="text-xs text-gray-500 pt-3 float-right">
                                    {{$notification_created_at[$key]}}
                                </div>
                            </td>
                            @if (!$notification_read_at[$key])
                                <td class="flex flex-row justify-center items-center text-blue-700 text-sm w-1/12">
                                    <i class="fas fa-circle"></i>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</x-app-layout>
