<x-app-layout>
    <div class="bg-gray-50 font-sans" x-data="{ showTypes: false }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-gray-50 border-b border-gray-200">

                <div class="mt-10 mb-20">

                    @if (session('success'))
                        <div class="flex justify-center fixed bottom-5 left-5 z-20">
                            <div
                                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-green-600 border-green-600 text-white">
                                <div>
                                    {{ session('success') }}
                                </div>
                                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                                    <a @click="open = false"
                                        class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300 cursor-pointer">
                                        Dismiss </a>
                                </div>
                            </div>
                        </div>
                        @php
                            session()->forget('success');
                        @endphp
                    @endif


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
