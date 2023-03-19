@if (isset($enter_classroom) && $enter_classroom)
    <div id="meet"></div>

    <script   src='https://meet.theuttererscorner.com/external_api.js'></script>
    <script  >
        const domain = "meet.theuttererscorner.com";
        const options = {
            roomName: '{{ $student->first_name }} {{ $student->last_name }} - Lesson Room',
            width: "100%",
            height: "100%",
            parentNode: document.querySelector('#meet')
        };

        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
@else
    <x-app-layout>
        <div class="font-bold">
                <div class="py-20 flex flex-col items-center">
                    <p class="text-red-500 text-3xl">{{ $message1 }}</p>
                    <p class="text-gray-700 text-lg">{{ $message2 }}</p>
                </div>
        </div>
    </x-app-layout>
@endif
