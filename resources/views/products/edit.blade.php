<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    @method('PATCH')
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            Edit Product
                        </p>
                        <div>
                            <div class="pt-6 pb-2 space-y-1">

                                <p class="font-bold text-gray-600 mb-1">Cover</p>
                                <input type="file" name="product_image" id="product_image" class="hidden"
                                    accept=".jpeg,.jpg,.png,.webp">
                                <label for="product_image" class="flex items-center text-blue-800 cursor-pointer">
                                    <img id="preview-image-before-upload" src="{{ Storage::url($product->image) }}"
                                        alt="preview image" class="object-none w-full max-h-56">
                                </label>
                                <p class="text-gray-500 text-sm font-light">Please select an image for the product</p>

                            </div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter product name"
                                    required value="{{ $product->name }}"
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('name')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter product name</p>
                            </div>
                            <div class="pb-6 pt-3 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Description</p>
                                <textarea name="description" id="description" placeholder="Enter product description" required rows="4"
                                    class="resize-none w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('description')) border-red-600 @else border-gray-300 @endif">{{ $product->description }}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('description')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter product description</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Regular price</p>
                                <input type="number" name="regular_price" id="regular_price" placeholder="0"
                                    min="0" step="0.01" required value="{{ $product->regular_price }}"
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('regular_price')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('regular_price'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('regular_price')[0] }}
                                    </p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter product regular price</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Sale price</p>
                                <input type="number" name="sale_price" id="sale_price" placeholder="0" min="0"
                                    step="0.01" value="{{ $product->sale_price }}"
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('sale_price')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('sale_price'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('sale_price')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter product sale price</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Categories</p>
                                <div id="selected-categories" name="selected-categories"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-categories-input" name="categories">
                                <select id="categories-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('categories')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Selecciona una categoría</option>
                                    @foreach ($categories as $category)
                                        @if (!$product->categories->pluck('name')->contains($category->name))
                                            <option value="{{ $category->id }}" data-value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <p class="text-xs font-light text-red-600">
                                        {{ $errors->get('categories')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a category for the product</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Courses</p>
                                <div id="selected-courses" name="selected-courses"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-courses-input" name="courses">
                                <select id="courses-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('courses')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        @if (!$product->courses->pluck('name')->contains($course->name))
                                            <option value="{{ $course->id }}" data-value="{{ $course->id }}">
                                                {{ $course->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('courses'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('courses')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a course for the product</p>
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
    <script type="text/javascript">
        $(document).ready(function(e) {

            $('#product_image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
    <script>
        // JavaScript: Escuchar el evento change del select y crear el chip
        var selectedCategories = [];
        var categories = [];
        $('#categories-select').on('change', function() {
            var option = $(this).find('option:selected');
            var chip = $(
                '<div data-value="' + $(option).data('value') +
                '" class="category_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                option.text() +
                '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            );
            $('#selected-categories').append(chip);
            categories.push(parseInt(option.val()));
            $('#selected-categories-input').val(categories.join(','));
            option.remove();
            console.log($('#selected-categories-input').val());
        });

        //JavaScript: Eliminar el chip seleccionado
        $(document).on('click', '.category_chip i.close', function() {
            var chip = $(this).parent();
            var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                'data-value') + '">' + chip.text().trim() + '</option>');
            $('#categories-select').append(option);
            var index = categories.indexOf(parseInt(chip.attr('data-value')));
            if (index > -1) {
                categories.splice(index, 1);
            }
            $('#selected-categories-input').val(categories.join(','));
            chip.remove();
            console.log($('#selected-categories-input').val());
        });

        // JavaScript: Escuchar el evento change del select y crear el chip
        var selectedCourses = [];
        var courses = [];
        $('#courses-select').on('change', function() {
            var option = $(this).find('option:selected');
            var chip = $(
                '<div data-value="' + $(option).data('value') +
                '" class="course_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                option.text() +
                '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            );
            $('#selected-courses').append(chip);
            courses.push(parseInt(option.val()));
            $('#selected-courses-input').val(courses.join(','));
            option.remove();
            console.log($('#selected-courses-input').val());
        });

        //JavaScript: Eliminar el chip seleccionado
        $(document).on('click', '.course_chip i.close', function() {
            var chip = $(this).parent();
            var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                    'data-value') + '">' + chip.text().trim() +
                '</option>');
            $('#courses-select').append(option);
            var index = courses.indexOf(parseInt(chip.attr('data-value')));
            if (index > -1) {
                courses.splice(index, 1);
            }
            $('#selected-courses-input').val(courses.join(','));
            chip.remove();
            console.log($('#selected-courses-input').val());
        });

        $(document).ready(function() {
            selectedCategories = @json($product->categories);
            selectedCategories.forEach(element => {
                var chip = $(
                    '<div data-value="' + element.id +
                    '" class="category_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                    element.name +
                    '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
                );
                $('#selected-categories').append(chip);
                categories.push(element.id);
                $('#selected-categories-input').val(categories.join(','));
            });

            selectedCourses = @json($product->courses);
            selectedCourses.forEach(element => {
                var chip = $(
                    '<div data-value="' + element.id +
                    '" class="course_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                    element.name +
                    '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
                );
                $('#selected-courses').append(chip);
                courses.push(element.id);
                $('#selected-courses-input').val(courses.join(','));
            });
        });
    </script>

</x-app-layout>
