<div x-data="{ openToolsPanel: false, enrolmentsModal: false, usersModal: false, unitsUsersModal: @entangle('unitUsersModal') }" x-cloak>
    <div @click="openToolsPanel = !openToolsPanel"
        class="fixed flex justify-center items-center bottom-5 left-5 bg-purple-600 hover:bg-purple-700 p-5 w-16 rounded-full font-bold text-white cursor-pointer">

        <i class="fas fa-tools text-2xl cursor-pointer" x-show="!openToolsPanel"></i>
        <i class="fas fa-times text-2xl cursor-pointer" x-show="openToolsPanel"></i>

    </div>
    <div x-show="openToolsPanel" x-transition
        class="fixed flex flex-col bottom-24 left-5 space-y-2 bg-purple-700 rounded-full">
        @foreach ($adminTools as $tool)
            <div class="flex justify-center items-center p-5 font-bold rounded-full hover:bg-purple-800 text-white cursor-pointer"
                @if (!empty($tool['modalName'])) @click="{{ $tool['modalName'] }} = !{{ $tool['modalName'] }}" @endif>
                <i class="{{ $tool['toolIcon'] }} text-2xl cursor-pointer"></i>
            </div>
        @endforeach
    </div>

    <x-modal type="info" name="usersModal" class="p-5 w-full">
        <x-slot name="title"></x-slot>
        <x-slot name="content" class="p-5">
            <div class="flex">
                <p class="text-2xl font-bold w-full text-center">Users</p>
            </div>
            @if (count($users) > 0)
                <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                    <thead>
                        <tr class="flex text-md justify-around">
                            <th class="flex justify-center w-9/12 w-max-9/12">Role</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">First Name</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Last Name</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Username</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Email</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Timezone</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Street</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">City</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Country</th>
                            <th class="flex justify-center w-9/12 w-max-9/12">Zip Code</th>
                            <th class="flex justify-center w-9/12 w-max-9/12"></th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4">

                        @foreach ($users as $key => $user)
                            <tr class="flex justify-evenly space-x-2">
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->roles[0]->name }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->first_name }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->last_name }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->username }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->email }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->timezone }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->street }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->city }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->country }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <input type="text" class="w-full p-1 border-none" disabled
                                        value="{{ $user->zip_code }}" />
                                </td>
                                <td class="flex w-9/12 max-w-xs border text-center justify-center">
                                    <a href="{{ route('impersonate', $user->id) }}"
                                        class="bg-lw-blue text-white py-2 px-4 rounded-md font-semibold hover:bg-blue-800">Impersonate</a>
                                </td>
                            </tr>
                        @endforeach

                        {{ $enrolments->links() }}
                    </tbody>
                </table>
            @else
                <div class="my-20">
                    <p class="text-2xl font-bold w-full text-center text-gray-600">There are no enrolments</p>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-modal>

    <x-modal type="info" name="unitsUsersModal" class="p-5 w-1/2 mx-auto">
        <x-slot name="title"></x-slot>
        <x-slot name="content" class="p-5">
            <div class="flex">
                <p class="text-2xl font-bold w-full text-center my-4">Assign unit to student</p>
            </div>
            <div class="space-y-5">
                <div class="flex flex-col">
                    <select name="studentToAssociate" id="studentToAssociate" wire:model="studentToAssociate"
                        class="w-1/2 mx-auto bg-white border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{-- <option value="" class="text-gray-500 font-bold uppercase" disabled selected>
                            Select a Student</option> --}}
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" selected>{{ $student->first_name }}
                                {{ $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <select name="unitToAssociate" id="unitToAssociate" wire:model="unitToAssociate"
                        class="w-1/2 mx-auto bg-white border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{-- <option value="" class="text-gray-500 font-bold uppercase" disabled selected>
                            Select a Unit</option> --}}
                        @forelse ($courses as $course)
                            <option value="" class="text-gray-500 font-bold uppercase" disabled>
                                {{ $course->name }}</option>
                            @forelse($course->modules->sortBy('order') as $module)
                                <option value="" class="text-gray-400 uppercase" disabled>-
                                    {{ $module->name }}</option>
                                @forelse($module->units->sortBy('order') as $unit)
                                    @if (
                                        $loop->even ||
                                            $course->categories()->pluck('name')->contains('Test') ||
                                            $course->modality == 'asynchronous')
                                        <option value="{{ $unit->id }}" selected>--- {{ $unit->name }}</option>
                                    @endif
                                @empty
                                    <option value="" disabled>- No Units</option>
                                @endforelse
                            @empty
                                <option value="" disabled>- No Modules</option>
                            @endforelse
                        @empty
                            <option value="" disabled>No Courses</option>
                        @endforelse
                    </select>
                </div>
                <button wire:click="assignUnitToStudent()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Associate</button>
            </div>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-modal>

    <x-modal type="info" name="enrolmentsModal" class="p-5 w-full">
        <x-slot name="title"></x-slot>
        <x-slot name="content" class="p-5">
            <div class="flex">
                <p class="text-2xl font-bold w-full text-center">Enrolments</p>
                <a href="{{ route('enrolments.create') }}"
                    class="bg-lw-blue text-white py-2 px-4 rounded-md font-semibold hover:bg-blue-800">New</a>
            </div>
            @if (count($enrolments) > 0)
                <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                    <thead>
                        <tr class="flex text-md justify-around">
                            <th class="flex justify-center w-full">Teacher</th>
                            <th class="flex justify-center w-full">Student</th>
                            <th class="flex justify-center w-full">Course</th>
                            <th class="flex justify-center w-full">Enrolment Date</th>
                            <th class="flex justify-center w-full"></th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4">

                        @foreach ($enrolments as $key => $enrolment)
                            <tr class="flex justify-around">
                                @if ($enrolment->teacher)
                                    <td class="flex w-full justify-center">
                                        <a href="{{ route('profile.show', $enrolment->teacher->id) }}"
                                            class="hover:underline hover:text-blue-500">{{ $enrolment->teacher->first_name }}
                                            {{ $enrolment->teacher->last_name }}</a>
                                    </td>
                                @else
                                    <td class="flex w-full justify-center">
                                        -
                                    </td>
                                @endif
                                @if ($enrolment->student)
                                    <td class="flex w-full justify-center">
                                        <a href="{{ route('profile.show', $enrolment->student->id) }}"
                                            class="hover:underline hover:text-blue-500">{{ $enrolment->student->first_name }}
                                            {{ $enrolment->student->last_name }}</a>
                                    </td>
                                @else
                                    <td class="flex w-full justify-center">
                                        -
                                    </td>
                                @endif
                                <td class="flex w-full justify-center">
                                    <a href="{{ route('courses.show', $enrolment->course->id) }}"
                                        class="hover:underline hover:text-blue-500">
                                        {{ $enrolment->course->name }}</a>
                                </td>
                                <td class="flex w-full justify-center cursor-pointer hover:underline">
                                    {{ $enrolment->updated_at->format('d/m/Y - h:00 a') }}
                                </td>
                                <td class="flex w-full justify-center space-x-5" x-data="{ trash: true, deleteConfirmation: false }" x-cloak>
                                    <a href="{{ route('enrolments.edit', $enrolment->id) }}">
                                        <i class="fas fa-edit text-gray-600"></i>
                                    </a>
                                    <button @click="trash = false, deleteConfirmation = true" x-show="trash">
                                        <i class="fas fa-trash text-gray-600"></i></button>
                                    <form action="{{ route('enrolments.destroy', $enrolment->id) }}" method="POST"
                                        x-show="deleteConfirmation"
                                        @click.outside="deleteConfirmation=false, trash = true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fas fa-check m-1 text-red-500"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        {{ $enrolments->links() }}
                    </tbody>
                </table>
            @else
                <div class="my-20">
                    <p class="text-2xl font-bold w-full text-center text-gray-600">There are no enrolments</p>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-modal>

    @if ($success == true)
        <div class="flex justify-center fixed bottom-5 left-5 z-20" x-data="{ openSuccess: true }" x-show="openSuccess"
            x-cloak>
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-green-600 border-green-600 text-white">
                <div>
                    {{ $message }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                    <button @click="openSuccess = false"
                        class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300 cursor-pointer">
                        Dismiss </button>
                </div>
            </div>
        </div>
        @php
            $success = false;
        @endphp
    @endif

    @if ($error == true)
        <div class="flex justify-center fixed bottom-5 left-5 z-20" x-data="{ openError: true }" x-show="openError"
            x-cloak>
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                <div>
                    {{ $message }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                    <button @click="openError = false"
                        class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">
                        Dismiss </button>
                </div>
            </div>
        </div>
        @php
            $error = false;
        @endphp
    @endif

    <div wire:loading>
        @include('components.loading-state')
    </div>
</div>
