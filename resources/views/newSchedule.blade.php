<x-app-layout>

    {{-- @php
        $teachers = App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get()->pluck('id');
        dd($teachers);
    @endphp --}}

    {{-- STUDENT SELECT --}}
    @livewire('schedule-controller', ['users' => auth()->id(), 'action' => 'studentShow'])
    
    {{-- TEACHERS SHOW --}}
    {{-- @livewire('schedule-controller', ['users' => auth()->id(), 'mode' => 'show']) --}}

</x-app-layout>
