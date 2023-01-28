@php
    $title = 'Lingowow Invoice ' . (new Carbon\Carbon($invoice->created_at))->isoFormat('MMM Y') . ' (' . str_pad($invoice->user->id, 6, '0', STR_PAD_LEFT) . ' - ' . str_pad($invoice->id, 9, '0', STR_PAD_LEFT) . ')';
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="{{ $message->embed(Storage::url('images/logo_512x512_transparente.png')) }}"> --}}
                                <img src="{{ Storage::url('images/logo_512x512_transparente.png') }}"
                                    style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Invoice #: {{ $invoice->id }}<br />
                                Created: {{ (new Carbon\Carbon($invoice->created_at))->isoFormat('LL') }}<br />
                                Due: {{ (new Carbon\Carbon($invoice->created_at))->isoFormat('LL') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td> <strong>Paid To:</strong><br />
                                R & B GLOBAL SERVICES S.A.C.<br />
                                Apple H, Lot 10. Los Ficus St.<br />
                                Lima, PE 15112<br />
                                <a href="mailto:contact@lingowow.com">contact@lingowow.com</a>
                            </td>

                            <td> <strong>Invoiced To:</strong><br />
                                {{ $invoice->user->first_name }} {{ $invoice->user->last_name }}<br />
                                {{ $invoice->user->street }}<br />
                                {{ $invoice->user->zip_code }}<br />
                                {{ $invoice->user->city }}, {{ $invoice->user->country }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            {{-- <tr class="heading">
                <td>Payment Method</td>

                <td>Check #</td>
            </tr>

            <tr class="details">
                <td>Check</td>

                <td>1000</td>
            </tr> --}}

            <tr class="heading">
                <td>Item</td>
                {{-- <td>Price</td> --}}
                <td>Price</td>
            </tr>
            @foreach ($invoice->items as $item)
                <tr class="item @if ($loop->last) last @endif">
                    <td>{{ $item->item_name }}</td>

                    <td>${{ $item->item_price }} <span style="color:#aaa">x</span> {{ $item->item_qty }}</td>
                </tr>
            @endforeach

            <tr class="total">
                <td></td>
                <td>Total: ${{ $invoice->price }}</td>
            </tr>
        </table>
    </div>
</body>

</html>