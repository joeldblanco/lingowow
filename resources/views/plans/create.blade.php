<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('plans.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Plan
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter plan name"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('name')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter plan name</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Number of classes (per month)</p>
                                <input type="number" name="classes" id="classes" placeholder="0" min="0"
                                    step="1" required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('classes')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('classes'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('classes')[0] }}
                                    </p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter plan number of classes (Enter 0
                                    for Single-payment products)</p>
                            </div>
                            <div class="pt-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Product</p>
                                <select id="product_id" name="product_id"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('product_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('product_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a product for the plan</p>
                            </div>
                            <div class="pt-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Features (included)</p>
                                <div id="selected-features" name="selected-features"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-features-input" name="features">
                                <select id="features-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('feature_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a feature (included)</option>
                                    @foreach ($features as $feature)
                                        <option value="{{ $feature->id }}" data-value="{{ $feature->id }}">
                                            {{ $feature->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('feature_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('feature_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a feature for the plan</p>
                            </div>
                            <div class="pt-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Features (not included)</p>
                                <div id="selected-features-not-included" name="features_not_included"
                                    class="bg-white border border-gray-300 rounded p-2"></div>
                                <input type="hidden" id="selected-features-not-included-input"
                                    name="features_not_included">
                                <select id="features-not-included-select"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('features_not_included')) border-red-600 @else border-gray-300 @endif">
                                    <option value="">Select a feature (not included)</option>
                                    @foreach ($features as $feature)
                                        <option value="{{ $feature->id }}" data-value="{{ $feature->id }}">
                                            {{ $feature->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('features_not_included'))
                                    <p class="text-xs font-light text-red-600">
                                        {{ $errors->get('features_not_included')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a feature for the plan</p>
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
        <script>
            // JavaScript: Escuchar el evento change del select y crear el chip
            var selectedFeatures = [];
            var features = [];
            $('#features-select').on('change', function() {
                var option = $(this).find('option:selected');
                var chip = $(
                    '<div data-value="' + $(option).data('value') +
                    '" class="feature_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                    option.text() +
                    '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
                );
                $('#selected-features').append(chip);
                features.push(parseInt(option.val()));
                $('#selected-features-input').val(features.join(','));
                option.remove();

                var select = $('#features-not-included-select');
                select.find('option').each(function() {
                    var dataValue = $(this).data('value');

                    if (dataValue === $(option).data('value')) {
                        $(this).remove();
                        return false;
                    }
                });

                console.log($('#selected-features-input').val());
            });

            //JavaScript: Eliminar el chip seleccionado
            $(document).on('click', '.feature_chip i.close', function() {
                var chip = $(this).parent();
                var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                    'data-value') + '">' + chip.text().trim() + '</option>');
                $('#features-select').append(option);
                var index = features.indexOf(parseInt(chip.attr('data-value')));
                if (index > -1) {
                    features.splice(index, 1);
                }
                $('#selected-features-input').val(features.join(','));
                chip.remove();

                var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                    'data-value') + '">' + chip.text().trim() + '</option>');
                $('#features-not-included-select').append(option);


                console.log($('#selected-features-input').val());
            });

            // JavaScript: Escuchar el evento change del select y crear el chip
            var selectedFeaturesNotIncluded = [];
            var featuresNotIncluded = [];
            $('#features-not-included-select').on('change', function() {
                var option = $(this).find('option:selected');
                var chip = $(
                    '<div data-value="' + $(option).data('value') +
                    '" class="feature_not_included_chip bg-transparent border-2 border-gray-400 text-gray-400 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
                    option.text() +
                    '<i class="fas fa-times text-white text-sm rounded-full bg-gray-400 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
                );
                $('#selected-features-not-included').append(chip);
                featuresNotIncluded.push(parseInt(option.val()));
                $('#selected-features-not-included-input').val(featuresNotIncluded.join(','));
                option.remove();

                var select = $('#features-select');
                select.find('option').each(function() {
                    var dataValue = $(this).data('value');

                    if (dataValue === $(option).data('value')) {
                        $(this).remove();
                        return false;
                    }
                });

                console.log($('#selected-features-not-included-input').val());
            });

            //JavaScript: Eliminar el chip seleccionado
            $(document).on('click', '.feature_not_included_chip i.close', function() {
                var chip = $(this).parent();
                var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                        'data-value') + '">' + chip.text().trim() +
                    '</option>');
                $('#features-not-included-select').append(option);
                var index = featuresNotIncluded.indexOf(parseInt(chip.attr('data-value')));
                if (index > -1) {
                    featuresNotIncluded.splice(index, 1);
                }
                $('#selected-features-not-included-input').val(featuresNotIncluded.join(','));
                chip.remove();

                var option = $('<option value="' + chip.attr('data-value') + '" data-value="' + chip.attr(
                    'data-value') + '">' + chip.text().trim() + '</option>');
                $('#features-select').append(option);

                console.log($('#selected-features-not-included-input').val());
            });

            // $(document).ready(function() {
            //     selectedFeatures = @json($features);
            //     selectedFeatures.forEach(element => {
            //         var chip = $(
            //             '<div data-value="' + element.id +
            //             '" class="feature_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
            //             element.name +
            //             '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            //         );
            //         $('#selected-features').append(chip);
            //         features.push(element.id);
            //         $('#selected-features-input').val(features.join(','));
            //     });

            //     selectedFeaturesNotIncluded = @json($features);
            //     selectedFeaturesNotIncluded.forEach(element => {
            //         var chip = $(
            //             '<div data-value="' + element.id +
            //             '" class="feature_not_included_chip bg-transparent border-2 border-green-500 text-green-500 rounded-full px-2 py-1 m-2 inline-block font-bold">' +
            //             element.name +
            //             '<i class="fas fa-times text-white text-sm rounded-full bg-green-500 close ml-2 px-2 py-1 cursor-pointer"></i></div>'
            //         );
            //         $('#selected-features-not-included').append(chip);
            //         featuresNotIncluded.push(element.id);
            //         $('#selected-features-not-included-input').val(featuresNotIncluded.join(','));
            //     });
            // });
        </script>
    </div>

</x-app-layout>
