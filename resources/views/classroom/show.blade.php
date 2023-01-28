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
        <div class="text-2xl font-bold">
            <div colspan="4" class="text-center">
                <div class="py-20 text-red-500">{{ $message }}</div>
            </div>
        </div>
    </x-app-layout>
@endif
