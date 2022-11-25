<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Course
                        </p>
                        <div>
                            <div class="pt-6 pb-2 space-y-1">

                                <p class="font-bold text-gray-600 mb-1">Cover</p>
                                <input type="file" name="course_image" id="course_image" class="hidden"
                                    accept=".jpeg,.jpg,.png,.webp">
                                <label for="course_image" class="flex items-center text-blue-800 cursor-pointer">
                                    <img id="preview-image-before-upload"
                                        src="{{ Storage::url(DB::table('metadata')->where('key', 'sample_image_url')->first()->value) }}"
                                        alt="preview image" class="object-none w-full max-h-56">
                                </label>
                                <p class="text-gray-500 text-sm font-light">Please select an image for the course</p>

                            </div>
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Category</p>
                                <select name="category" id="category" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('category')) border-red-600 @else border-gray-300 @endif">
                                    <option value="" selected disabled hidden>Select a category</option>
                                    @foreach (['English', 'Spanish'] as $category)
                                        //TO-DO: Get categories from DB
                                        <option value="{{ $category }}">
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a category for the course</p>
                            </div>
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Modality</p>
                                <select name="modality" id="modality" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('modality')) border-red-600 @else border-gray-300 @endif">
                                    <option value="" selected disabled hidden>Select a modality</option>
                                    @foreach (['Synchronous', 'Asynchronous'] as $modality)
                                        //TO-DO: Get modalities from DB
                                        <option value="{{ $modality }}">
                                            {{ $modality }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('modality'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a modality for the course</p>
                            </div>
                            <div class="py-4 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter course name"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter course name</p>
                            </div>
                            <div class="py-4 pt-3 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Description</p>
                                <textarea name="description" id="description" placeholder="Enter course description" required rows="4"
                                    class="resize-none w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('description')) border-red-600 @else border-gray-300 @endif"></textarea>
                                @if ($errors->has('description'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter course description</p>
                            </div>
                            {{-- <div class="py-4 pt-3 space-y-1">
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
                                <p class="text-gray-500 text-sm font-light">Please select a status for the course</p>
                            </div> --}}
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
    <script type="text/javascript">
        $(document).ready(function(e) {

            $('#course_image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

                // $("#preview-image-before-upload").toggleClass("hidden");
                // $("#post_content").attr('required', false);

            });

        });
    </script>

</x-app-layout>
