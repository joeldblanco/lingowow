<div>
    <x-jet-dialog-modal wire:model="showModalMenuUsers">

        <x-slot name="title">
            <div class="w-full center-h">Select one student</div>
        </x-slot>

        <x-slot name="content">

            <div class="mb-2">
                <div class="w-full center-h title-activity">STUDENTS</div>
                <div class="w-full center-h">
                    <input wire:model="name" id="search-student" class="w-full inpWord" type="text" placeholder="Search">
                </div>
                <div class="w-full grid grid-cols-3 gap-x-2 gap-y-2 mt-2">
                    @foreach ($students as $key => $student)
                        {{-- {{dd($id_ac)}} --}}
                        {{-- {{dd($student->activities()->find($id_ac))}} --}}
                        @if ($student->activities()->find($id_ac) == null)
                            <div class="w-full center-b card-menu"><button id="{{ $student->id }}"
                                    class="btn-assign-student">{{ $student->first_name }}
                                    {{ $student->last_name }}</button>
                            </div>
                        @else
                            <div class="w-full center-b card-menu-selected"><button disabled id="{{ $student->id }}"
                                    class="btn-assign-student-selected">{{ $student->first_name }}
                                    {{ $student->last_name }}</button>
                            </div>
                        @endif
                    @endforeach

                    {{-- <div id="mark_the_word" class="w-full center-h card-menu">Mark the words</div>
                    <div id="find_the_word" class="w-full center-h card-menu">Find the words</div> --}}
                </div>
            </div>


        </x-slot>

        <x-slot name="footer">
            <button class="btn-assign-close">Close</button>
        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showModalConfirm">

        <x-slot name="title">
            <div class="w-full center-h">Confirm?</div>
        </x-slot>

        <x-slot name="content">
            @if (!empty($activity))
                <div class="mb-2">
                    <div class="w-full center-h">Do you want to assign the activity "{{ $activity->name }}" to the
                        student
                        {{ $student_assign->first_name }} {{ $student_assign->last_name }}?</div>
                </div>
            @endif


        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-center gap-x-5 mt-5">
                <button class="btn-black-outliner btn-assign-student-confirm">Confirm</button>
                <button class="btn-black-outliner btn-assign-student-close">Cancel</button>
            </div>
            {{-- <button class="">Cancel</button> --}}
        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showModalDelete">

        <x-slot name="title">
            <div class="w-full center-h">Delete?</div>
        </x-slot>

        @if (!empty($activity))
            {{ dd($activity) }}
            <x-slot name="content">

                <div class="mb-2">
                    <div class="w-full center-h">Do you want to delete this activity ?</div>
                    <br>
                    <div class="w-full center-h">
                        <div>Name: {{ $activity->name }}</div>
                        <div>Unit: {{ $activity->unit->unit_name }}</div>
                    </div>
                </div>


            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-center gap-x-5 mt-5">
                    {{-- <button class="btn-black-outliner btn-assign-student-confirm">Delete</button> --}}
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-black-outliner" type="submit">Delete</button>
                    </form>
                    <button class="btn-black-outliner btn-assign-student-close">Cancel</button>
                </div>
                {{-- <button class="">Cancel</button> --}}
            </x-slot>
        @endif

    </x-jet-dialog-modal>
</div>
