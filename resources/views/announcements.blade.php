<x-app-layout>

    <div class="font-sans homeHeigth home-tour" style="background-color: #F0F2F5;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <div class="mt-5 w-3/6 mx-auto">

                    @livewire('posts-component', ['user' => App\Models\User::find(6)])

                </div>

            </div>
        </div>
        @role('guest')
            <x-shepherd-tour tourName="guests/home" role="guest" />
        @endrole
        @role('teacher')
            <x-shepherd-tour tourName="teachers/home" role="teacher" />
        @endrole
        @role('student')
            <x-shepherd-tour tourName="students/home" role="student" />
        @endrole
    </div>

</x-app-layout>
