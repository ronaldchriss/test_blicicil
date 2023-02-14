<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="invoice-title">
					<h2>Invoice</h2><h3 class="pull-right">Order # {{$t_detail->id}}</h3>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6">
						<address>
						<strong>Billed To:</strong><br>
						{{$t_detail->name_customer}}<br>
						{{$t_detail->no_telp}}<br>
						{!! str_replace(",", "<br>", $t_detail->address) !!}
							
						</address>
					</div>
					<div class="col-xs-6 text-right">
						<address>
						<strong>Order Date:</strong><br>
						{{date('F, d Y', strtotime($t_detail->created_at))}}<br><br>
						</address>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-xs-6">
						<address>
							<strong>Payment Method:</strong><br>
							Visa ending **** 4242<br>
							jsmith@email.com
						</address>
					</div>
					<div class="col-xs-6 text-right">
						<address>
							<strong>Order Date:</strong><br>
							March 7, 2014<br><br>
						</address>
					</div>
				</div> -->
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Order summary</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><strong>Item</strong></td>
										<td class="text-center"><strong>Price</strong></td>
										<td class="text-center"><strong>Quantity</strong></td>
										<td class="text-right"><strong>Totals</strong></td>
									</tr>
								</thead>
								<tbody>
									@foreach($t_detail->detail as $item)
									<tr>
										<td>{{$item->product}}</td>
										<td class="text-center">@currency($item->price)</td>
										<td class="text-center">{{$item->quantity}}</td>
										<td class="text-right">@currency($item->q_price)</td>
									</tr>
									
									@endforeach
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Total</strong></td>
										<td class="no-line text-right">@currency($t_detail->sum_price)</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


<script>
	setTimeout(function () { window.print(); }, 500);
    window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>

</html>