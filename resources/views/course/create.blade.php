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
                            {{-- <div class="pt-6 pb-2 space-y-1">
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
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('category')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a category for the course</p>
                            </div> --}}
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Modality</p>
                                <select name="modality" id="modality" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('modality')) border-red-600 @else border-gray-300 @endif">
                                    <option value="" selected disabled hidden>Select a modality</option>
                                    @foreach (['synchronous', 'asynchronous'] as $modality)
                                        //TO-DO: Get modalities from DB
                                        <option value="{{ $modality }}">
                                            {{ $modality }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('modality'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('modality')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a modality for the course</p>
                            </div>
                            <div class="py-4 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter course name"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('name')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter course name</p>
                            </div>
                            <div class="pt-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Categories</p>
                                <div id="selected-categories" name="selected-categories"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-categories-input" name="categories">
                                <select id="categories-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('category_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('category_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a category for the product</p>
                            </div>
                            <div class="py-4 pt-3 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Description</p>
                                <textarea name="description" id="description" placeholder="Enter course description" required rows="4"
                                    class="resize-none w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('description')) border-red-600 @else border-gray-300 @endif"></textarea>
                                @if ($errors->has('description'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('description')[0] }}</p>
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
    <script>
        // JavaScript: Escuchar el evento change del select y crear el chip
        var selectedCategories = [];
        $('#categories-select').on('change', function() {
            var option = $(this).find('option:selected');
            var chip = $(
                '<div class="chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                option.text() +
                '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            );
            $('#selected-categories').append(chip);
            selectedCategories.push(option.val());
            $('#selected-categories-input').val(selectedCategories.join(','));
            option.remove();
        });

        //JavaScript: Eliminar el chip seleccionado
        $(document).on('click', '.chip i.close', function() {
            var chip = $(this).parent();
            var option = $('<option value="' + chip.attr('data-value') + '">' + chip.text().trim() + '</option>');
            $('#categories-select').append(option);
            $('#categories-select').append(option);
            var index = selectedCategories.indexOf(chip.attr('data-value'));
            if (index > -1) {
                selectedCategories.splice(index, 1);
            }
            $('#selected-categories-input').val(selectedCategories.join(','));
            chip.remove();
        });
    </script>

</x-app-layout>
