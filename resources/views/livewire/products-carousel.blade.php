<div class="mt-10 mb-20" x-data="{ loadingState: @entangle('loadingState') }">
    <style>
        .content-div {
            background-image: url('https://images.unsplash.com/photo-1522093007474-d86e9bf7ba6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=80');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        /* .content-div:hover {
            background-image:
                linear-gradient(to right,
                    rgba(126, 213, 111, 0.801), hsla(160, 64%, 43%, 0.801))
                url('https://images.unsplash.com/photo-1522093007474-d86e9bf7ba6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=80');
        } */

        /* .content-div:hover {
            background-image:
        } */

        .image-cover {
            height: 260px;
        }

        /*
        -remove the classes below if you have the 'group-hover'property added in your tailwind config file
        -also remove the class from the html template
        */
        .content-div:hover .fd-cl {
            opacity: 0.25;
        }

        .content-div:hover .fd-sh {
            opacity: 1;
        }
    </style>
    <h3 class="text-4xl font-bold my-10 text-gray-800">Courses</h3>
    <div class="products-carousel flex flex-wrap w-full justify-evenly items-end" {{-- gallery js-flickity  data-flickity-options='{ "wrapAround": true }' wire:ignore --}}>
        @foreach ($course_products as $product)
            <div class="w-1/3 h-5/6 max-h-" @if ($loop->first) id="course-card" @endif>
                {{-- <div class="relative bg-white rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10 flex flex-col">
                    <div class="bg-green-600 w-full p-4 rounded-t-lg text-white">
                        <p class="text-xl font-semibold my-2">{{ $product->name }}</p>
                    </div>
                    <div class="pt-8 px-6 pb-4 border border-green-600">
                        <div class="flex space-x-2 text-gray-400 text-sm items-center">
                            <!-- svg  -->
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="language"
                                class="svg-inline--fa fa-language fa-w-20 h-7 w-7" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M152.1 236.2c-3.5-12.1-7.8-33.2-7.8-33.2h-.5s-4.3 21.1-7.8 33.2l-11.1 37.5H163zM616 96H336v320h280c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24zm-24 120c0 6.6-5.4 12-12 12h-11.4c-6.9 23.6-21.7 47.4-42.7 69.9 8.4 6.4 17.1 12.5 26.1 18 5.5 3.4 7.3 10.5 4.1 16.2l-7.9 13.9c-3.4 5.9-10.9 7.8-16.7 4.3-12.6-7.8-24.5-16.1-35.4-24.9-10.9 8.7-22.7 17.1-35.4 24.9-5.8 3.5-13.3 1.6-16.7-4.3l-7.9-13.9c-3.2-5.6-1.4-12.8 4.2-16.2 9.3-5.7 18-11.7 26.1-18-7.9-8.4-14.9-17-21-25.7-4-5.7-2.2-13.6 3.7-17.1l6.5-3.9 7.3-4.3c5.4-3.2 12.4-1.7 16 3.4 5 7 10.8 14 17.4 20.9 13.5-14.2 23.8-28.9 30-43.2H412c-6.6 0-12-5.4-12-12v-16c0-6.6 5.4-12 12-12h64v-16c0-6.6 5.4-12 12-12h16c6.6 0 12 5.4 12 12v16h64c6.6 0 12 5.4 12 12zM0 120v272c0 13.3 10.7 24 24 24h280V96H24c-13.3 0-24 10.7-24 24zm58.9 216.1L116.4 167c1.7-4.9 6.2-8.1 11.4-8.1h32.5c5.1 0 9.7 3.3 11.4 8.1l57.5 169.1c2.6 7.8-3.1 15.9-11.4 15.9h-22.9a12 12 0 0 1-11.5-8.6l-9.4-31.9h-60.2l-9.1 31.8c-1.5 5.1-6.2 8.7-11.5 8.7H70.3c-8.2 0-14-8.1-11.4-15.9z">
                                </path>
                            </svg>
                            <p>{{ $product->category }}</p>
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        </div>
                        <div class="border-t-2"></div>

                        <div class="flex justify-between">
                            <div class="my-2">
                                <p class="font-semibold text-base mb-2 float-left">Modality</p>
                                <div class="text-base text-gray-400 font-semibold">
                                    <p>{{ ucfirst($product->modality) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="selectProduct({{ $product->id }})"
                        class="inline-block bg-green-600 text-white px-6 py-2 rounded-b-lg hover:bg-green-700">Select</button>
                </div> --}}

                <div class="relative bg-white rounded-3xl my-4 shadow-xl mt-7 mb-2 mx-5 flex flex-col">
                    <div class="container shadow-lg group rounded-md bg-white max-w-sm flex justify-center items-center mx-auto content-div"
                        style="background-image: url('{{ Storage::url($product->image) }}');"
                        onMouseOver="this.style.backgroundImage='linear-gradient(90deg, rgba(50,70,186,0.6) 0%, rgba(28,117,187,0.6) 80%), url({{ Storage::url($product->image) }})'"
                        onMouseOut="this.style.backgroundImage='url({{ Storage::url($product->image) }})'">
                        <div class="flex flex-col items-center">
                            <div class="w-full image-cover rounded-t-md blur-xl">
                                {{-- <div
                                    class="p-2 m-4 w-16 h-16 text-center bg-gray-700 rounded-full text-white float-right fd-cl group-hover:opacity-25">
                                    <span class="text-base tracking-wide  font-bold border-b border-white font-sans">
                                        12</span>
                                    <span class="text-xs tracking-wide font-bold uppercase block font-sans">April</span>
                                </div> --}}
                            </div>
                            <div class="py-8 px-4 bg-white rounded-b-md fd-cl group-hover:opacity-25 w-10/12">
                                <span
                                    class="block text-lg text-gray-800 font-bold tracking-wide">{{ $product->name }}</span>
                                {{-- <span class="block text-gray-600 text-sm">{{ $product->description }} --}}
                                </span>
                            </div>
                        </div>
                        <div class="absolute opacity-0 fd-sh group-hover:opacity-100 text-center px-4">
                            <span
                                class="text-3xl font-bold text-white tracking-wider leading-relaxed font-sans">{{ $product->name }}</span>
                            <div class="pt-8 text-center">
                                <button wire:click="selectProduct({{ $product->id }})"
                                    class="text-center rounded-lg p-4 bg-white  text-gray-700 font-bold text-lg"
                                    @if ($loop->first) id="select-button" @endif>Select</button>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        @endforeach
        @if (auth()->id() == 5)
            @foreach ($other_products as $product)
                <div class="w-1/3 h-5/6 max-h-" @if ($loop->first) id="course-card" @endif>

                    <div class="relative bg-white rounded-3xl my-4 shadow-xl mt-7 mb-2 mx-5 flex flex-col">
                        <div class="container shadow-lg group rounded-md bg-white max-w-sm flex justify-center items-center mx-auto content-div"
                            style="background-image: url('{{ Storage::url($product->image) }}');"
                            onMouseOver="this.style.backgroundImage='linear-gradient(90deg, rgba(50,70,186,0.6) 0%, rgba(28,117,187,0.6) 80%), url({{ Storage::url($product->image) }})'"
                            onMouseOut="this.style.backgroundImage='url({{ Storage::url($product->image) }})'">
                            <div class="flex flex-col items-center">
                                <div class="w-full image-cover rounded-t-md blur-xl">
                                </div>
                                <div class="py-8 px-4 bg-white rounded-b-md fd-cl group-hover:opacity-25 w-10/12">
                                    <span
                                        class="block text-lg text-gray-800 font-bold tracking-wide">{{ $product->name }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="absolute opacity-0 fd-sh group-hover:opacity-100 text-center px-4">
                                <span
                                    class="text-3xl font-bold text-white tracking-wider leading-relaxed font-sans">{{ $product->name }}</span>
                                <div class="pt-8 text-center">
                                    <button wire:click="selectProduct({{ $product->id }})"
                                        class="text-center rounded-lg p-4 bg-white  text-gray-700 font-bold text-lg"
                                        @if ($loop->first) id="select-button" @endif>Select</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        @endif
    </div>
    <div wire:loading>
        @include('components.loading-state')
    </div>
    {{-- <script>
        async function selectProduct(object) {
            // console.log(object);
            @this.selectProduct(object);
            // await new Promise(r => setTimeout(r, 1000));
            window.location = '#plans';
        }
    </script> --}}

    {{-- @role('guest')
        <x-shepherd-tour tourName="guests/products-carousel" role="guest" />
    @endrole --}}
</div>
