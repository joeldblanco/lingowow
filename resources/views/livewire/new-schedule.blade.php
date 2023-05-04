<div class="my-8 mb-8" x-data="{ editSchedule: true, cancelEdition: false, saveEdition: false }" x-cloak>

    @role('teacher')
        <div class="flex w-full justify-end space-x-4">
            <button onclick="startEdition()" x-show="editSchedule"
                x-on:click="editSchedule = false, cancelEdition = true, saveEdition = true"
                class="bg-lw-blue px-4 py-2 rounded-md text-white font-bold hover:bg-blue-800 mb-5">
                Clear Schedule
                <i class="fas fa-eraser"></i>
            </button>
            <button onclick="cancelEdition()" x-show="cancelEdition"
                x-on:click="editSchedule = true, cancelEdition = false, saveEdition = false"
                class="bg-red-600 px-4 py-2 rounded-md text-white font-bold hover:bg-red-700 mb-5">
                Cancel
            </button>
            <button onclick="saveEdition()" x-show="saveEdition"
                x-on:click="editSchedule = true, cancelEdition = false, saveEdition = false"
                class="bg-green-600 px-4 py-2 rounded-md text-white font-bold hover:bg-green-700 mb-5">
                Save
            </button>
        </div>
    @endrole
    @if ($action == 'classRescheduling')
        <div class="dateReason-tour mb-10">
            <input class="w-full mb-2" type="text" name="absenceReason" id="absenceReason"
                placeholder="Reason for rescheduling" {{-- wire:model.debounce.1000ms="absenceReason" --}} required>
            <span class="text-red-500">
                @error('absenceReason')
                    {{ $message }}
                @enderror
            </span>
        </div>
    @endif

    @if ($errors->has('absenceReason'))
        <div class="flex justify-center fixed bottom-5 left-5 z-20" x-data="{ open: true }" x-show="open">
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                <div>
                    {{ $errors->first('absenceReason') }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                    <button @click="open = false"
                        class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">
                        Dismiss </button>
                </div>
            </div>
        </div>
    @endif


    @if (!empty($week))
        <div class="flex w-full justify-end space-x-4">
            <button wire:click="previousWeek"
                class="@if ($week > 1) bg-lw-blue hover:bg-blue-800 @else bg-gray-300 cursor-not-allowed @endif select-none px-4 py-2 rounded-md text-white font-bold mb-5">
                <i class="fas fa-chevron-left"></i>
                Previous Week
            </button>
            <button wire:click="nextWeek"
                class="@if ($week < 4) bg-lw-blue hover:bg-blue-800 @else bg-gray-300 cursor-not-allowed @endif select-none px-4 py-2 rounded-md text-white font-bold mb-5">
                Next Week
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    @endif

    <div class="border-2">
        <table content-security-policy="default-src 'self'; style-src 'self' 'unsafe-inline';"
            class="border w-full h-full text-center select-none">
            <thead class="sticky top-0">
                <tr class="bg-blue-50 sticky top-0">
                    <th class="border sticky top-0">LOCAL</th>
                    @foreach ($days as $key => $day)
                        <th class="py-4 px-12 border sticky top-0">
                            <p>{{ $day }}</p>
                            @if (!empty($date))
                                <p class="text-sm text-gray-400">{{ $date[$key] }}</p>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="container" id="{{ $users }}">
                @for ($hour = 0; $hour < 24; $hour++)
                    <tr>
                        <td class="border">{{ Carbon\Carbon::now()->setHour($hour)->format('h:00 A') }}</td>
                        @foreach ($days as $key => $day)
                            <td id="{{ $hour }}-{{ $key }}"
                                @if (!empty($date)) data-date="{{ $date[$key] }}" @endif
                                class="border h-8 bg-gray-100 selectee @if (in_array([$hour, $key], $schedules)) {{ $classForSelected }} @endif">

                                @php
                                    $count = 0;
                                    for ($i = 0; $i < count($studentClasses); $i++) {
                                        if ($studentClasses[$i] === [$hour, $key]) {
                                            $count++;
                                        }
                                    }
                                @endphp

                                @for ($i = 0; $i < $count; $i++)
                                    <button class="tooltip button_tooltip"></button>
                                @endfor

                            </td>
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    @if (
        $action == 'schedulePreselection' ||
            $action == 'classRescheduling' ||
            $action == 'manualEnrolment' ||
            $action == 'scheduleSelection' ||
            $action == 'examSelection')
        @hasanyrole('guest|student|admin')
            <div class="py-5 w-full flex justify-end">
                <button onclick="saveSchedule()"
                    class="bg-green-600 px-4 py-2 rounded-md text-white font-bold hover:bg-green-700 mb-5">
                    Save
                </button>
            </div>
        @endhasanyrole
    @endif

    <div wire:loading>
        @include('components.loading-state')
    </div>

    @if ($action != 'studentShow')
        {{-- <script>
            if (@json($action == 'studentShow' || $action == 'teacherShow' || $action == 'adminShow')) {
                classForSelectees = "selected";
            } else {
                classForSelectees = "available";
            }

            Livewire.hook('component.initialized', (component) => {

                console.log(component.fingerprint.name);

                let schedules = @json($schedules);

                schedules.forEach(element => {
                    document.getElementById(element[0] + '-' + element[1]).classList.add(classForSelectees);
                });

            })
        </script> --}}

        <script type="text/javascript" src="{{ asset('js/viselect.cjs.js') }}"></script>
        <script>
            schedules = @json($schedules);
            var schedulesTd = [];
            // var classSelected = schedules;
            schedules.forEach(element => {
                schedulesTd.push(document.getElementById(element[0] + '-' + element[1]));
            });

            studentsInfo = @json($studentsInfo);
            studentsInfo.forEach(student => {
                student.schedule.forEach(element => {
                    $('#' + @json($users) + ' #' + element[0] + '-' + element[1]).html(student
                        .student.first_name + ' ' + student
                        .student.last_name);
                });
            });


            var limit;
            var classForSelected = @json($classForSelected);
            var classForSelectees = @json($classForSelectees);

            if (@json($limit) == null) {
                limit = $('.selectee').length;
            } else {
                limit = @json($limit);
            }

            var selection = new SelectionArea({
                    selectables: ["td." + classForSelectees],
                    boundaries: [".container"],
                })
                .on("move", ({
                        store: {
                            changed: {
                                added,
                                removed
                            },
                        }
                    }) => {
                        for (var el of added) {
                            if ($('.selected').length < limit) {
                                el.classList.add('selected');
                            }
                        }

                        for (var el of removed) {
                            el.classList.remove('selected');
                        }

                    }

                );
            selection.disable();

            var startSelection = false;

            function startEdition() {
                startSelection = !startSelection;

                if (startSelection) {
                    selection.enable();
                    $('.selected').each(function() {
                        $(this).removeClass('selected');
                        $(this).addClass('available');
                    });
                } else {
                    selection.disable();
                    $('.available').each(function() {
                        $(this).removeClass('available');
                    });
                }
            }

            function cancelEdition() {
                startSelection = !startSelection;

                if (startSelection) {
                    selection.enable();
                    $('.selected').each(function() {
                        $(this).removeClass('selected');
                    });
                } else {
                    selection.disable();
                    selection.clearSelection();

                    $('.selected').each(function() {
                        $(this).removeClass('selected');
                    });

                    $('.available').each(function() {
                        $(this).removeClass('available');
                        $(this).addClass('selected');
                    });
                }
            }

            function saveEdition() {
                let selected = [];
                $('.selected').each(function() {
                    selected.push([$(this).attr('id').split('-')[0], $(this).attr('id').split('-')[1]]);
                });

                Livewire.emit('updateSchedule', selected);

                startSelection = !startSelection;
                selection.disable();
                selection.clearSelection();
            }

            function saveSchedule() {

                let scheduleData = [];
                scheduleData[0] = $('#absenceReason').val();

                if ($('#absenceReason').val() == "" && @json($action == 'classRescheduling')) {
                    alert('Please enter an absence reason');
                } else {
                    scheduleData[1] = [];
                    if (@json(!empty($week))) {
                        $('.selected').each(function() {
                            scheduleData[1].push([$(this).attr('id').split('-')[0], $(
                                this).attr('id').split('-')[1], $(this).attr('data-date')]);
                        });
                    } else {
                        $('.selected').each(function() {
                            scheduleData[1].push([$(this).attr('id').split('-')[0], $(this).attr('id').split('-')[1]]);
                        });
                    }

                    Livewire.emit('saveSchedule', scheduleData);
                    startSelection = !startSelection;
                    selection.disable();
                    selection.clearSelection();
                }
            }

            window.addEventListener('scheduleUpdated', event => {

                $('.selected').each(function() {
                    $(this).removeClass('selected');
                });

                event.detail.schedule.forEach(element => {
                    $('#' + element[0] + '-' + element[1]).addClass('selected')
                });
            });

            window.addEventListener('scheduleLoaded', event => {

                $('.selected').each(function() {
                    $(this).removeClass('selected');
                });

                event.detail.schedule.forEach(element => {
                    $('#' + element[0] + '-' + element[1]).addClass('available')
                });
            });

            window.addEventListener('weekChanged', event => {

                $('.available').each(function() {
                    $(this).removeClass('.available');
                });

                event.detail.schedule.forEach(element => {
                    $('#' + element[0] + '-' + element[1]).addClass('available')
                });
            });

            if (@json($action == 'schedulePreselection') || @json($action == 'scheduleSelection') || @json($action == 'classRescheduling') ||
                @json($action == 'manualEnrolment')) {
                selection.enable();
            }

            document.addEventListener("DOMContentLoaded", () => {
                Livewire.hook('element.updated', (el, component) => {
                    selection.enable();
                });
            });
        </script>
    @else
        <script>
            Livewire.hook('component.initialized', (component) => {
                let schedules = @json($schedules);

                schedules.forEach(element => {
                    $('#' + element[0] + '-' + element[1]).addClass('selected')
                });
            })
        </script>
    @endif

</div>
