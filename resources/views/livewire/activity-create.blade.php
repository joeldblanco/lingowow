<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200" x-data="{ activity_modal: false }">

                <button class="bg-green-700 py-2 px-4 rounded-md font-semibold text-gray-100 hover:bg-green-800"
                    @click="activity_modal = true">Add</button>

                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data"
                    id="activities_form">
                    @csrf
                    @method('POST')

                    <div class="p-5 w-full" id="activities_container">

                    </div>
                    <input type="submit" value="Submit"
                        class="py-2 px-4 rounded-md bg-blue-500 font-semibold text-white">
                </form>

                <x-modal type="info" name="activity_modal">
                    <x-slot name="title">
                        Add activity
                    </x-slot>

                    <x-slot name="content">
                        <button onclick="addActivity('card')"
                            class="bg-lw-blue py-2 px-4 rounded-md font-semibold text-gray-100 hover:bg-blue-800">
                            Card
                        </button>
                    </x-slot>

                    <x-slot name="footer" class="justify-center">
                    </x-slot>
                </x-modal>

            </div>
        </div>
    </div>
    <script>
        let counter = 0;

        function addActivity(type) {

            let images = document.createElement("input");
            images.type = "file";
            images.id = ++counter;
            images.name = "file_" + counter + "[]";
            images.accept = "image/*";
            images.setAttribute("multiple");

            let title = document.createElement("input");
            title.type = "text";
            title.name = "title_" + counter;
            title.setAttribute("multiple");

            let form = document.getElementById('activities_container');
            form.appendChild(images);
            form.appendChild(title);
        }
    </script>
</x-app-layout>
