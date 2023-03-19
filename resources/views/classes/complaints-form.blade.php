<x-app-layout>
    <div class="bg-purple-100 mx-5 rounded-lg py-5 px-20">
        <form action="{{ route('classes.complaint') }}" method="POST" class="w-1/2 mx-auto my-10 border p-7 rounded-lg bg-white">
            @csrf

            <div class="w-full flex flex-col">
                <h1 class="text-2xl font-bold text-left mb-5">Complaint Form</h1>
                <input type="hidden" name="class_id" value="{{ $class_id }}">
                <input placeholder="Subject" type="text" name="subject" id="subject"
                    class="border border-gray-400 rounded-md px-2 py-2 my-2" required>
                <textarea placeholder="Complaint" name="complaint" id="complaint" cols="30" rows="10"
                    class="border border-gray-400 rounded-md px-2 py-2 my-2 resize-none" required></textarea>
                <div class="w-full flex justify-end">
                    <button
                        class="bg-lw-blue px-4 py-2 text-white font-bold my-4 rounded-md hover:bg-blue-800">Send</button>
                </div>
        </form>
    </div>
</x-app-layout>
