<x-app-layout>

    <div class="w-4/5 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Title</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($invoices as $invoice)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{$invoice->title}}</td>
                    <td class="py-4 px-6 border-b border-grey-light">${{$invoice->price}}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{$invoice->updated_at->isoFormat('L')}}</td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="{{route('invoice.show',$invoice->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

</x-app-layout>