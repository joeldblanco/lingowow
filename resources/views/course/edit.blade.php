<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    @method('PATCH')
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            Edit Course
                        </p>
                        <div>
                            <div class="pt-6 pb-2 space-y-1">

                                <p class="font-bold text-gray-600 mb-1">Cover</p>
                                <input type="file" name="course_image" id="course_image" class="hidden"
                                    accept=".jpeg,.jpg,.png,.webp">
                                <label for="course_image" class="flex items-center text-blue-800 cursor-pointer">
                                    <img id="preview-image-before-upload" src="{{ Storage::url($course->image_url) }}"
                                        alt="preview image" class="object-none w-full max-h-56">
                                </label>
                                <p class="text-gray-500 text-sm font-light">Please select an image for the course</p>

                            </div>
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Modality</p>
                                <select name="modality" id="modality" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('modality')) border-red-600 @else border-gray-300 @endif">
                                    {{-- <option value="" disabled hidden>Select a modality</option> --}}
                                    @foreach (['synchronous', 'asynchronous'] as $modality)
                                        //TO-DO: Get modalities from DB
                                        <option value="{{ $modality }}"
                                            @if ($modality == $course->modality) selected @endif>
                                            {{ Str::ucfirst($modality) }}
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
                                    value="{{ $course->name }}" required
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
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('categories')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        @if (!$course->categories->pluck('name')->contains($category->name))
                                            <option value="{{ $category->id }}" data-value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('categories')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a category for the product</p>
                            </div>
                            <div class="pt-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Products</p>
                                <div id="selected-products" name="selected-products"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-products-input" name="products">
                                <select id="products-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('products')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a product</option>
                                    @foreach ($products as $product)
                                        @if (!$course->products->pluck('name')->contains($product->name))
                                            <option value="{{ $product->id }}" data-value="{{ $product->id }}">
                                                {{ $product->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('products'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('products')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a product for the course</p>
                            </div>
                            <div class="py-4 pt-3 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Description</p>
                                <textarea name="description" id="description" placeholder="Enter course description" required rows="4"
                                    class="resize-none w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('description')) border-red-600 @else border-gray-300 @endif">{{ $course->description }}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('description')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter course description</p>
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

            $('#course_image').change(function() {

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
        });

        // JavaScript: Escuchar el evento change del select y crear el chip
        var selectedProducts = [];
        var products = [];
        $('#products-select').on('change', function() {
            var option = $(this).find('option:selected');
            var chip = $(
                '<div data-value="' + $(option).data('value') +
                '" class="product_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                option.text() +
                '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            );
            $('#selected-products').append(chip);
            products.push(parseInt(option.val()));
            $('#selected-products-input').val(products.join(','));
            option.remove();
        });

        //JavaScript: Eliminar el chip seleccionado
        $(document).on('click', '.product_chip i.close', function() {
            var chip = $(this).parent();
            var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                'data-value') + '">' + chip.text().trim() + '</option>');
            $('#products-select').append(option);
            var index = products.indexOf(parseInt(chip.attr('data-value')));
            if (index > -1) {
                products.splice(index, 1);
            }
            $('#selected-products-input').val(products.join(','));
            chip.remove();
        });

        $(document).ready(function() {
            selectedCategories = @json($course->categories);
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

            selectedProducts = @json($course->products);
            selectedProducts.forEach(element => {
                var chip = $(
                    '<div data-value="' + element.id +
                    '" class="product_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                    element.name +
                    '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
                );
                $('#selected-products').append(chip);
                products.push(element.id);
                $('#selected-products-input').val(products.join(','));
            });
        });
    </script>

</x-app-layout>
