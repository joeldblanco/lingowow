<x-app-layout>
    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">

    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                    <img id="logo" src="{{ Storage::url('images/logo_512x512_transparente.png') }}"
                        title="Lingowow" alt="Lingowow" class="w-16 mb-3" />
                    <p class="font-bold">Lingowow</p>
                </div>
                <div class="col-sm-5 text-center text-sm-right">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                @php
                    $date = explode(' ', $invoice->created_at);
                    $user = App\Models\User::where('id', $invoice->user_id)->first();
                    $items = DB::table('items')
                        ->where('invoice_id', $invoice->id)
                        ->get();
                @endphp
                <div class="col-sm-6"><strong>Date:</strong> {{ $date[0] }}</div>
                <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> {{ $invoice->id }}</div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Paid To:</strong>
                    <address>
                        Lingowow<br />
                        2705 N. Canta Callao Av<br />
                        Lima, PE 07031<br />
                        <a href="mailto:contact@lingowow.com">contact@lingowow.com</a>
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                    <address>
                        {{ $user->first_name }} {{ $user->last_name }}<br />
                        {{ $user->street }}<br />
                        {{ $user->zip_code }}<br />
                        {{ $user->city }}, {{ $user->country }}
                    </address>
                </div>
            </div>
            <table class="table mb-0">
                <thead class="card-header">
                    <tr>
                        <td class="col-3 border-0"><strong>Service</strong></td>
                        <td class="col-4 border-0"><strong>Description</strong></td>
                        <td class="col-2 text-center border-0"><strong>Rate</strong></td>
                        <td class="col-1 text-center border-0"><strong>QTY</strong></td>
                        <td class="col-2 text-right border-0"><strong>Amount</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="col-3 border-0">{{ $item->item_name }}</td>
                            <td class="col-4 text-1 border-0">Description</td>
                            <td class="col-2 text-center border-0">${{ $item->item_price }}</td>
                            <td class="col-1 text-center border-0">{{ $item->item_qty }}</td>
                            <td class="col-2 text-right border-0">${{ $item->item_price * $item->item_qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="card-footer">
                    <tr>
                        <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
                        <td class="text-right">${{ $invoice->price }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Tax:</strong></td>
                        <td class="text-right">$0</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                        <td class="text-right">${{ $invoice->price }}</td>
                    </tr>
                </tfoot>
            </table>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a>
                <button onclick="window.location.assign('{{ url()->current() }}')"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i>
                    Download</button>
            </div>
        </footer>
    </div>
</x-app-layout>
