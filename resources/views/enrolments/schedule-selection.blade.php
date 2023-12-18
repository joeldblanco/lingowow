<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <!-- Teachers Carousel Component -->
                @livewire('teachers-carousel', ['available_teachers' => $selected_teacher])

                <!-- Schedule Controller Component -->
                @if ($action == 'examSelection')
                    @livewire('schedule-controller', [
                        'limit' => 2,
                        'users' => $selected_teacher,
                        'action' => 'examSelection',
                        'data' => ['manualEnrolment' => true],
                        'week' => App\Http\Controllers\ApportionmentController::getWeekOfPeriod(now()),
                    ])
                @else
                    @livewire('schedule-controller', [
                        'limit' => (int) $plan,
                        'users' => $selected_teacher,
                        'action' => $action,
                        'data' => $data,
                    ])
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
