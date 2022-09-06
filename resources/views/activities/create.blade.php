<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200" x-data="{ unitsModal: false }" x-cloak>

                <x-modal type="info" name="unitsModal">
                    <x-slot name="title">
                        Select unit
                    </x-slot>

                    <x-slot name="content">
                        Are you sure you want to save your schedule?
                    </x-slot>

                    <x-slot name="footer" class="justify-center">
                        <button
                            onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.check',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                            class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                            @click=" unitsModal = false ">
                            Save
                        </button>
                        <button
                            class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                            @click=" unitsModal = false ">
                            Cancel
                        </button>
                    </x-slot>
                </x-modal>

                <button @click="unitsModal = true">Seleccionar unidad</button>

                <form action="post">
                    @csrf
                    <input type="submit" value="Submit">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
