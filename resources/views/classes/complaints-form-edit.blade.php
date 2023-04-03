<x-app-layout>
    <div class="bg-purple-100 mx-5 rounded-lg py-5 px-20">
        <form action="{{ route('classes.complaint.update') }}" method="POST" class="w-1/2 mx-auto my-10 border p-7 rounded-lg bg-white">
            @csrf
            {{-- {{dd($complaint)}} --}}
            <div class="w-full flex flex-col">
                <h1 class="text-2xl font-bold text-left mb-5">Complaint Form</h1>
                <input type="hidden" name="class_id" value="{{ $class_id }}">
                <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                <input placeholder="Subject" type="text" name="subject" id="subject"
                    class="border border-gray-400 rounded-md px-2 py-2 my-2" value="{{ $complaint->subject }}" required>
                <textarea placeholder="Complaint" name="complaint" id="complaint" cols="30" rows="10"
                    class="border border-gray-400 rounded-md px-2 py-2 my-2 resize-none" required>{{ $complaint->complaint }}</textarea>
                <div class="w-full flex justify-end">
                    <button type="button" onclick="showModal()" class="bg-lw-red px-4 py-2 text-white font-bold ml-4 my-4 rounded-md hover:bg-red-600" id="deleteComplaintButton">
                        Eliminar Queja
                    </button>
                    
                    <button
                        class="bg-lw-blue px-4 py-2 text-white font-bold ml-4 my-4 rounded-md hover:bg-blue-800">Send</button>
                </div>
        </form>
    </div>

    <div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h2 class="text-xl font-bold mb-4">Confirm</h2>
                    <p class="text-gray-700 mb-4">Are you sure you want to delete this complaint?</p>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form method="POST" action="{{ route('classes.complaint.delete', $complaint->id) }}">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete complaint
                        </button>
                    </form>
                    <button type="button" onclick="hideModal()" class="mt-3 w-full sm:mt-0 sm:w-auto inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm" id="cancelDeleteButton">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showModal() {
        document.getElementById('myModal').classList.remove('hidden');
        }
        function hideModal() {
        document.getElementById('myModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
