<x-app-layout>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{-- <livewire:classes-component :classes="$classes" :students="$students" :teachers="$teachers"/> --}}
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">

                @livewire('classes-component')

            </div>
        </div>
    </div>
    <script>
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
