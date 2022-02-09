<x-app-layout>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                
                <livewire:teachers-carousel />
                
                <livewire:scheduling-calendar plan="{{$plan}}" />

            </div>
        </div>
    </div>

</x-app-layout>