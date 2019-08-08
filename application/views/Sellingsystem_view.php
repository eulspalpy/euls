<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Selling System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<!-- <form method="POST" action="<?php echo base_url().'Pos_controllers/update1'?>">
		<input type="hidden" name="form_id" class="input-form_id" >
		<input type="number" name="qtyy" id="qtyy" for="append qty">
	
</form> -->

<body>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/logined' ?>"> Home</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/selling' ?>"> System</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/inventory' ?>"> Inventory</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/dailysalesreport' ?>"> DailySales</a>
<div class="col-md-3 float-right">
	<div class="form-group float-left">
		<form class="form-horizontal" id="finalform">
		<input for="" type='hidden' id='sample'>
		<label class="font-weight-bold">Total</label>
		<div>
		<input class="form-control p-3 mb-2" type="number" name="finaltotal" id="finaltotal" placeholder="total">
		</div>
		<label class="font-weight-bold">Cash</label>
		<input class="form-control p-3 mb-2" type="number" name="cash" id="cash" placeholder="cash">
		<label class="font-weight-bold">Change</label>
		<input class="form-control p-3 mb-2" type="number" name="change" id="change" placeholder="change">
		<button type="button" id="submit" class="btn btn-success">Submit</button>
		<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/selling' ?>"> refresh</a>
		</form>
		
		</div>
	</div>
	</body>
	<div class="container-fluid bg-2 text-center">
			<div class="col-sm-8">
			<form class="form-horizontal" id="addprodform">
					<caption>Add Products</caption>
				<table class="table table-striped table-bordered table-hover table-dark">
				  <thead class="thead-dark">

				    <tr>
			      <th scope="col">Product Code</th>
			      <th scope="col">Product Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Qty</th>
			      <th scope="col-md-3">Amount</th>
			      <th scope="col">Option</th>
			    </tr>
			  </thead>
				  <tbody>
					<div class="form-group row">
						<form>
								<tr>
								<input type="hidden" name="form_id" class="input-form_id">
								<td><input id="procode" type="number" class=" form-control"name="procode"></td>							
								<td><input id="pname" readonly class="form-group-plaintext" type="text" class="form-control"name="pname"></td> 
								<td><input id="price" readonly class="form-group-plaintext" type="number" class="form-control"name="price"></td> 
								<td><input id="qty" type="number" class="form-control"name="qty"></td> 							
								<td><input for='total' readonly class="form-group-plaintext" id="total" type="number" class="form-control"name="total"></td> 
								<td><a href="javascript:;" class=" btn-sm btn-info btnAdd" onclick="addProduct()" id="btnAdd1">Add</a></td>
							</tr>	
							</form> 
					</div>
				  		
									 
					</tbody>
			</table>
		</form>
		<form class="form-horizontal">
					<caption>Products</caption>
					<table class="table-striped table-bordered table-hover" id="product_list">
						<thead class="thead-dark">
							<tr>
								<th style="width: 100px;">Remove</th>
								<th style="width: 180px;">Product Code</th>
								<th style="width: 180px;">Product Name</th>
								<th style="width: 180px;">Unit Price</th>
								<th style="width: 65px;">Qty</th>
								<th style="width: 18th style0px;">Amount</th>
							</tr>
						</thead>
						<tbody>
							
 					    
						</tbody>
					</table>
			</form>

	</div>
</div>

<!-- modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="myForm" method="POST" action="<?php echo base_url().'Pos_controllers/update1'?>">
      		<div class="form-group">
	       		<table class="table-striped table-bordered table-hover table-dark">
		      		<thead>
			      		<tr>

			      		<th style="width: 150px;" class="text-center">Product Name</th>
			      		<th style="width: 100px; "class="text-center">Price</th>
			      		<th style="width: 50px; "class="text-center">Qty</th>
			      		</tr>
		      		</thead>	
		      		<tbody>
		      			<tr>
		      				<input type="hidden" name="form_id" class="input-form_id">
		      				<th><input id="product" type="text" class="input_product form-control"name="product"></th>
		      				<th><input id="price" type="number" class="input_price form-control"  name="price"></th>
		      				<th><input id="qty" type="number" class="input_qty form-control" name="qty"></th>
		      			</tr>
		      		</tbody>
      			</table>     			

      		</div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnSave1" name="submit" type="submit" class="btn btn-primary">Save changes</button>

		
      	</form>
      	   
      </div>

    </div>
  </div>
</div>
<!-- modal -->

</html>



<script type="text/javascript">
var baseUrl = "<?php echo base_url() ?>";

// $('#procode').empty();
$('#procode').keyup(function(){
 
	$.ajax({
		url: baseUrl+'Pos_controllers/search',
		method: 'POST',
		dataType: 'json',
		data: {
			procode: $('#procode').val()
		},
		success: function(res){
			// res = JSON.parse(res); -- if using dataType set as json... theres no need to use JSON.parse..

			if(res.success) {
				// console.log('test');
				$('#pname').val(res.data.productname);
				$('#price').val(res.data.price);
				// $('#qtyy1').val(res.data.qty)
				$('#qty').focus();
			}
		}

	});


});


$(function(){

$('#price, #qty').on('click keyup keydown', qty);

function qty(){
	var sum =(

Number($('#price').val()) * Number($('#qty').val())
		);
$('#total').val(sum);
// console.log(sum);
}


});




$(function(){

$('#finaltotal, #cash').on('click keyup keydown', qty);

function qty(){
	var sum =(

Number($('#cash').val()) - Number($('#finaltotal').val())
		);
$('#change').val(sum);
// console.log(sum);
}


});



function addProduct(){

	var products = {
		procode: $('#procode').val(),
		pname: $('#pname').val(),
		price: $('#price').val(),
		qty: $('#qty').val(),
		total: $('#total').val(),
		button: '<button type="button" class="button" class="btn btn-warning">delete</button>'
	};

	addRow(products);

	$('#addprodform')[0].reset();
}

var total = 0;
var total1= 0;
var total2=0;
var rowId = 1;
function addRow(products){
	var $table = $('#product_list tbody');
	var $row = `<tr data-row-id="${rowId}">
		<td> <button type='button' name='record' class='btn btn-warning btn-xs' onclick='deleterow(this)'>Delete</td>
		<td class='procodefinal'> ${products.procode}  </td>
		<td class='pnamefinal'> ${products.pname} </td>
		<td class='pricefinal'> ${products.price} </td>
		<td class='qtyFinal'> ${products.qty} </td>
		<td class='totalAmount'> ${products.total} </td>
		</tr>`;

	console.log($table);
	console.log($row);
	
	total += Number(products.total);
	total1 += Number(products.qty);
	$('#finaltotal').val(total);
	$table.append($row);
	$('#qtyy').val(total1);

	rowId++;

}
$('#product_list').on('click', '.delete-product', function(event) {
	deleteRow($(event.currentTarget).parent('tr'));
});

function deleterow(e){
	product_total_cost=parseInt($(e).parent().parent().find('td:last').text(),10);
	total-=product_total_cost;
	$('#finaltotal').val(total);
	$(e).parent().parent().remove();
}

$('#submit').click(function(){
	var rows = $('#product_list tbody').find('tr');
	var rowsData = [];

	$.each(rows, function(index, row) {
		var $row = $(row);
		rowsData.push({
			procode: $row.find('.procodefinal').text().trim(),
			pname: $row.find('.pnamefinal').text().trim(),
			price: $row.find('.pricefinal').text().trim(),
			qty: $row.find('.qtyFinal').text().trim(),
			amount: $row.find('.totalAmount').text().trim()
		});
			
		console.log(rowsData);
	});
	
	$.ajax({
			url: baseUrl+'Pos_controllers/submit',
			method: 'post',
			data: {insert_data: rowsData}
			}).then(function(response){
				response = JSON.parse(response);

				if(response.success) 
				{
					alert('Success Please Refresh');
				} else {
					alert('Error');
				}	
			});	

	
	
	// return;


});




</script>