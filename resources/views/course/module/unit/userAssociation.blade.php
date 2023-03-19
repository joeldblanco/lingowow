<x-app-layout>
    <div class="bg-gray-50 font-sans" x-data="{ showTypes: false }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-gray-50 border-b border-gray-200">

                <div class="mt-10 mb-20">

                    @if (session()->exists('success'))
                        <div
                            class="rounded-md bg-green-500 font-semibold text-white w-full px-3 py-3 flex items-center justify-center mb-4">
                            <i class="fas fa-info-circle text-white text-lg"></i>
                            <p class="px-3">{{ session('success') }}</p>
                        </div>
                    @endif
                    @if (session()->exists('error'))
                        <div
                            class="rounded-md bg-red-500 font-semibold text-white w-full px-3 py-3 flex items-center justify-center mb-4">
                            <i class="fas fa-info-circle text-white text-lg"></i>
                            <p class="px-3">Error creating meeting! - {{ session('error')['message'] }}</p>
                        </div>
                    @endif
                    @php
                        session()->forget('success');
                        session()->forget('error');
                    @endphp


                    <form action="{{ route('units.associate') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col">
                            <label for="user" class="leading-loose">Student</label>
                            <select name="user" id="user"
                                class="w-full bg-white border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="" class="text-gray-500 font-bold uppercase" disabled selected>
                                    Select a Student</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="unit" class="leading-loose">Unit</label>
                            <select name="unit" id="unit"
                                class="w-full bg-white border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="" class="text-gray-500 font-bold uppercase" disabled selected>
                                    Select a Unit</option>
                                @forelse ($courses as $course)
                                    <option value="" class="text-gray-500 font-bold uppercase" disabled>
                                        {{ $course->name }}</option>
                                    @forelse($course->modules->sortBy('order') as $module)
                                        <option value="" class="text-gray-400 uppercase" disabled>-
                                            {{ $module->name }}</option>
                                        @forelse($module->units->sortBy('order') as $unit)
                                            @if ($loop->even)
                                                <option value="{{ $unit->id }}">--- {{ $unit->name }}</option>
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
                        <input type="submit" value="Associate"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                    </form>


                </div>

            </div>


        </div>
    </div>

</x-app-layout>
