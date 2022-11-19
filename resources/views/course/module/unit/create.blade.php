<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('modules.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Unit
                        </p>
                        <div>
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Module</p>
                                <select name="module_id" id="module_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('module_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="" selected disabled hidden>Select a module</option>
                                    @foreach ($modules->sortBy('order') as $module)
                                        <option value="{{ $module->id }}">
                                            {{ $module->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('module_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a module for the unit</p>
                            </div>
                            <div class="py-4 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name"
                                    placeholder="Enter unit name" required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter unit name</p>
                            </div>
                            <div class="py-4 pt-3 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Status</p>
                                <select name="status" id="status" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('status')) border-red-600 @else border-gray-300 @endif">
                                    <option value="0">
                                        Inactive
                                    </option>
                                    <option value="1" selected>
                                        Active
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a status for the unit</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
