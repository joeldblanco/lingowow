<x-app-layout>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
    {{-- <livewire:classes-component :classes="$classes" :students="$students" :teachers="$teachers"/> --}}
    <div x-data="{showCommentsModal: false, classDetails: false}" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">
                <div class="flex justify-start w-full my-4 space-x-4">
                    <form action="{{ route('classes.index') }}">
                        <input autocomplete="off" value="{{ app('request')->start_date }}" type="text" id="start_date"
                            name="start_date" class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                        <input autocomplete="off" value="{{ app('request')->end_date }}" type="text" id="end_date"
                            name="end_date" class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                        <button class="bg-blue-700 rounded-md text-white py-2 px-4 hover:bg-blue-800">Search</button>
                    </form>
                </div>
                @livewire("classes-component")
            </div>
        </div>


    </div>  
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}">
        $(function() {
            $("#start_date").datepicker({
                altField: "#start_date",
                altFormat: "yy-mm-dd"
            });
            $("#end_date").datepicker({
                altField: "#end_date",
                altFormat: "yy-mm-dd"
            });
        });
    </script>
</x-app-layout>
