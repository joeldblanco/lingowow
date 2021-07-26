<x-app-layout>

    <table class="border-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Date</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{$invoice->title}}</td>
                    <td>{{$invoice->price}}</td>
                    <td>{{$invoice->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>    

</x-app-layout>