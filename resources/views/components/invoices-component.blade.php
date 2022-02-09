<x-app-layout>

    <div class="w-4/5 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
              <tr>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">Title</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">Total</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">Date</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($invoices as $invoice)
                <tr class="hover:bg-gray-200">
                    <td class="py-4 px-6 border-b border-gray-400">{{$invoice->title}}</td>
                    <td class="py-4 px-6 border-b border-gray-400">${{$invoice->price}}</td>
                    <td class="py-4 px-6 border-b border-gray-400">{{$invoice->updated_at->isoFormat('L')}}</td>
                    <td class="py-4 px-6 border-b border-gray-400">
                        <a href="{{route('invoice.show',$invoice->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-50 hover:bg-blue-300">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

</x-app-layout>