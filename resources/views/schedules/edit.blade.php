<x-app-layout>

    @livewire('teachers-carousel', ['available_teachers' => $enrolment->teacher->id])

    @livewire('schedule-controller', ['action' => 'adminEdit', 'limit' => count($enrolment->schedule->selected_schedule), 'users' => $enrolment->student->id, 'data' => ['enrolment_id' => $enrolment->id]])

</x-app-layout>
