<x-app-layout>

    <div class="py-12 bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">

                {{--DB::table('model_has_roles')->select('role_id')->where('model_id',auth()->id())->get()
                DB::table('invoices')->select('created_at')->where('user_id',auth()->id())->where('paid',1)->get()--}}

                {{Auth::user()->roles->pluck('name')}}

                <div>
                    <a href="{{route('classroom')}}" class="inline-block bg-blue-800 text-white px-6 py-4 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Classroom</a>
                </div>

                <x-scheduling-calendar />
            </div>
        </div>
    </div>

</x-app-layout>