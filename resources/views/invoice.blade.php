<x-app-layout>
<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">

<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="images/logo.png" title="The Utterers' Corner" alt="The Utterers' Corner" />
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
      $date = explode(" ",$invoice[0]->created_at);
      $user = DB::table('users')->where('id',$invoice[0]->user_id)->get();
      $items = DB::table('items')->where('invoice_id',$invoice[0]->id)->get();
    @endphp
    <div class="col-sm-6"><strong>Date:</strong> {{$date[0]}}</div>
    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> {{$invoice[0]->id}}</div>
	  
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Paid To:</strong>
      <address>
      The Utterers' Corner<br />
      2705 N. Canta Callao Av<br />
      Lima, PE 07031<br />
	    <a href="mailto:contact@theuttererscorner.com">contact@theuttererscorner.com</a>
      </address>
    </div>
    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
        <address>
          {{$user[0]->name}}<br />
          15 Hodges Mews, High Wycombe<br />
          HP12 3JL<br />
          United Kingdom
        </address>
    </div>
  </div>
	
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
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
                <td class="col-3 border-0">{{$item->item_name}}</td>
                <td class="col-4 text-1 border-0">Description</td>
                <td class="col-2 text-center border-0">${{$item->item_price}}</td>
                <td class="col-1 text-center border-0">{{$item->item_qty}}</td>
                <td class="col-2 text-right border-0">${{$item->item_price * $item->item_qty}}</td>
              </tr>
            @endforeach
          </tbody>
		  <tfoot class="card-footer">
			<tr>
              <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
              <td class="text-right">${{$invoice[0]->price}}</td>
            </tr>
            <tr>
              <td colspan="4" class="text-right"><strong>Tax:</strong></td>
              <td class="text-right">$0</td>
            </tr>
			<tr>
              <td colspan="4" class="text-right"><strong>Total:</strong></td>
              <td class="text-right">${{$invoice[0]->price}}</td>
            </tr>
		  </tfoot>
        </table>
      </div>
    </div>
  </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <button onclick="window.location.assign('{{url()->current()}}')" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</button> </div>
  </footer>
</div>
</x-app-layout>