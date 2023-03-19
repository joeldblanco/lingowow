<x-app-layout>

    {{-- @php
        $teachers = App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get()->pluck('id');
        dd($teachers);
    @endphp --}}

    {{-- STUDENT SELECT --}}
    @livewire('new-schedule', ['users' => auth()->id(), 'action' => 'studentShow'])
    
    {{-- TEACHERS SHOW --}}
    {{-- @livewire('new-schedule', ['users' => auth()->id(), 'mode' => 'show']) --}}

</x-app-layout>
