<div>
    {{-- <div x-data="{ showModal1: false, showModal2: false, showModal3: false }" :class="{'overflow-y-hidden': showModal1 || showModal2 || showModal3}"> --}}
    {{-- <main class="h-screen w-full flex flex-col sm:flex-row justify-center items-center">
        <button
        class="bg-red-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
        @click="showModal1 = true"
        >
        Click here
        </button>
        <button
        class="bg-green-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
        @click="showModal2 = true"
        >
        Click here
        </button>
        <button
        class="bg-blue-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
        @click="showModal3 = true"
        >
        Click here
        </button>
    </main> --}}

    <!-- Modal1 -->
    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal1"
        x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20" @click.outside="showModal1 = false"
                x-show="showModal1" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0">
                <header class="flex items-center justify-between p-2">
                    <h2 class="font-semibold">Are you sure?</h2>
                    <button wire:click="edit()" class="focus:outline-none p-2" @click="showModal1 = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </header>
                <main class="p-2 text-center">
                    <p class="my-5">
                        Are you sure you want to save your schedule?
                    </p>
                </main>
                <footer class="flex justify-center p-2">
                    <button wire:click="edit()"
                        onclick="saveSchedule({{ isset($user_schedules) ? count($user_schedules) : 0 }},'schedule.update',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                        class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModal1 = false, editBtn = true, edit = false, loadingState = true">
                        Save
                    </button>
                    <button wire:click="edit()"
                        class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModal1 = false ">
                        Cancel
                    </button>
                </footer>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showModal2" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.outside="showModal2 = false"
                x-show="showModal2" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0">
                <header class="flex flex-col justify-center items-center p-3 text-green-600">
                    <div class="flex justify-center w-28 h-28 border-4 border-green-600 rounded-full mb-4">
                        <svg class="fill-current w-20" viewBox="0 0 20 20">
                            <path
                                d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z">
                            </path>
                        </svg>
                        {{-- <svg class="fill-current w-20" viewBox="0 0 512 512">
                    <path
                        d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"
                    ></path>
                </svg> --}}
                    </div>
                    <h2 class="font-semibold text-2xl">Success</h2>
                </header>
                <main class="p-3 text-center">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatem, optio dolorem
                        accusantium fuga
                        molestias nobis sequi autem ducimus laudantium beatae amet earum, quia reiciendis corporis animi
                        modi
                        pariatur impedit!
                    </p>
                </main>
                <footer class="flex justify-center bg-transparent">
                    <button
                        class="bg-green-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click="showModal2 = false">
                        Confirm
                    </button>
                </footer>
            </div>
        </div>
    </div>

    <!-- Modal3 -->
    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showModal3" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto mt-10 mb-24 opacity-100">
            <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.outside="showModal3 = false"
                x-show="showModal3" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0">
                <header class="flex flex-col justify-center items-center p-3 text-blue-600">
                    <div class="flex justify-center w-28 h-28 border-4 border-blue-600 rounded-full mb-4">
                        <svg class="fill-current w-20" viewBox="0 0 20 20">
                            <path
                                d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="font-semibold text-2xl">Success</h2>
                </header>
                <main class="p-3 text-center">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatem, optio dolorem
                        accusantium fuga
                        molestias nobis sequi autem ducimus laudantium beatae amet earum, quia reiciendis corporis animi
                        modi
                        pariatur impedit!
                    </p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, quaerat! Perferendis,
                        saepe? Neque
                        consequuntur deserunt odio perferendis debitis, praesentium accusantium delectus totam qui
                        eligendi
                        voluptatibus molestiae nemo numquam, itaque sit? Sunt odit odio magni ipsam consectetur
                        distinctio nostrum
                        nihil optio reprehenderit quisquam! Commodi repellendus nobis necessitatibus quaerat aspernatur
                        quidem,
                        iure similique veniam, facere omnis ipsam quos porro. Recusandae, repudiandae quod? Hic aliquid
                        quam
                        incidunt. Repudiandae velit praesentium fuga sapiente atque quas assumenda iure necessitatibus
                        quidem
                        sequi, dolorum non labore expedita quisquam id. Blanditiis perferendis tenetur voluptatibus
                        iusto
                        obcaecati cupiditate mollitia. Ex accusantium assumenda quod, officiis voluptates nemo saepe
                        error quo ut
                        nulla id aspernatur voluptatem sit eligendi itaque ad nam officia iusto dolorum voluptatum,
                        alias
                        laboriosam perspiciatis hic ab? Excepturi. Inventore voluptate magni asperiores ab natus
                        dignissimos
                        reiciendis commodi temporibus porro molestiae! Minus, voluptates assumenda, nihil doloribus
                        labore
                        mollitia voluptas corporis sit placeat ullam harum temporibus voluptatibus explicabo praesentium
                        et. Quae
                        nemo quaerat sequi perspiciatis fugit nisi facere voluptatibus! Officiis ad sint iusto, corrupti
                        recusandae enim at itaque eaque omnis. Inventore consequuntur obcaecati, nulla beatae voluptas
                        ducimus.
                        Iste, eos accusantium. Ipsam corporis deleniti animi omnis. Totam necessitatibus minus eum,
                        quasi sint
                        ipsa dignissimos, repellat non temporibus quam pariatur. Est neque in repellendus quia officia
                        quibusdam
                        voluptas rerum impedit similique ipsa? Voluptatem inventore dicta excepturi officiis deleniti
                        repudiandae
                        iste sapiente nam impedit quisquam quia molestias recusandae ullam necessitatibus illum qui
                        officia
                        voluptatibus at cupiditate animi obcaecati, incidunt vero. Ut, commodi illum? Assumenda
                        explicabo dolores
                        id voluptates voluptatem, minima molestias quam reprehenderit aperiam totam minus. Rem ipsum
                        modi quas
                        architecto! Reiciendis omnis laboriosam exercitationem facilis, assumenda culpa fuga quas ipsam
                        maxime
                        tempore. Eum, recusandae optio neque illo, expedita nulla quod sit fugiat nam voluptate quaerat
                        nemo sint
                        reprehenderit doloremque minus provident. Ullam consequuntur unde perspiciatis cum praesentium
                        ipsa
                        quibusdam architecto voluptas id. Eveniet sint laborum debitis obcaecati autem rem similique
                        praesentium
                        cumque! Atque necessitatibus impedit harum ad suscipit iusto adipisci, dolorum doloremque,
                        corrupti quia
                        eaque nobis quae debitis numquam magni explicabo maiores? Nulla non sunt sed quibusdam nemo quod
                        quia odit
                        sapiente. Totam quaerat amet tenetur laboriosam quis enim sed sit error, quae maiores natus sint
                        numquam
                        voluptatum? Quasi odio quod pariatur. Quod architecto tempore voluptate dignissimos
                        necessitatibus velit
                        assumenda excepturi porro? Atque, numquam praesentium beatae illo dolor id earum ratione
                        repellat
                        voluptatibus ea, reiciendis ipsam magni nisi, accusamus reprehenderit vitae. Quidem? Asperiores
                        cupiditate
                        distinctio voluptates rem et quo placeat eveniet quaerat beatae, excepturi aspernatur autem
                        perspiciatis,
                        ab itaque suscipit hic sed exercitationem est iusto ipsam? Quasi quia cupiditate voluptatem.
                        Necessitatibus, doloremque? Non maiores explicabo quasi aperiam voluptates earum sed minima quia
                        odio
                        iusto accusantium dicta similique numquam voluptatum facilis, itaque, sint officiis aut corporis
                        repellat,
                        illum nemo. Eos qui magni deleniti! Inventore itaque praesentium facilis tenetur dolore beatae
                        rem sunt
                        vel voluptates, ratione sit, quas repellendus dicta sed repellat dolorum consectetur debitis
                        ipsa
                        excepturi fuga veniam. Repellat odio veritatis reprehenderit voluptatum. Aspernatur, ratione
                        maxime facere
                        autem aperiam accusamus commodi quibusdam molestiae natus animi! Suscipit, recusandae soluta?
                        Reprehenderit aspernatur quia, fugiat laborum, doloribus provident numquam sed laudantium ut
                        officiis
                        dolorem architecto. Animi. Incidunt obcaecati adipisci aspernatur accusamus, debitis, enim
                        delectus, cum
                        facere dicta quasi perferendis consequuntur? Quidem voluptatum placeat quia suscipit minus fugit
                        velit
                        reprehenderit ipsam, voluptatem laboriosam eum autem sequi nemo? Magnam placeat iure est soluta
                        nisi
                        consequuntur possimus in maiores autem. Itaque iure neque possimus quibusdam odit, recusandae
                        odio totam
                        maiores quidem consectetur, id cum perferendis et ducimus, earum sapiente. Hic ad accusamus
                        molestiae
                        nulla ducimus, tempore impedit sint ut tenetur! Recusandae dolorum adipisci est voluptatem illo
                        minima
                        sint saepe corrupti facilis amet ipsam, reprehenderit molestias doloribus, nostrum eos qui.
                    </p>
                </main>
                <footer class="flex justify-center bg-transparent">
                    <button
                        class="bg-blue-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click="showModal3 = false">
                        Confirm
                    </button>
                </footer>
            </div>
        </div>
    </div>

    {{-- MODAL REEMBOLSO DE CLASES REAGANDADAS --}}

    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showModalAbsence" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                @click.outside="showModalAbsence = false" x-show="showModalAbsence"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                <header class="flex items-center justify-between p-2">
                    <h2 class="font-semibold">Attention!</h2>
                    <button class="focus:outline-none p-2" @click="showModalAbsence = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </header>
                <main class="p-2 text-center">
                    <p class="my-5">
                        Are you sure you want to save your schedule?
                    </p>
                </main>
                <footer class="flex justify-center p-2">
                    <button
                        onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.update',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                        class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModalAbsence = false, editBtn = true, edit = false, loadingState = true">
                        Save
                    </button>
                    <button
                        class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModalAbsence = false ">
                        Cancel
                    </button>
                </footer>
            </div>
        </div>
    </div>



</div>
