<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('features.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Feature
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter feature name"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('name')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter feature name</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Details</p>
                                <input type="text" name="details" id="details" placeholder="Enter feature details"
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('details')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('details'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('details')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter feature details</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Detail Link</p>
                                <input type="text" name="link" id="link"
                                    placeholder="Enter feature detail link"
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('link')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('link'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('link')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter feature detail link</p>
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
