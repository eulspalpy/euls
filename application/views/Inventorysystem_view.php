<!DOCTYPE html>
<html>
<head>
	<title>InventorySystem</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/logined' ?>"> Home</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/selling' ?>"> System</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/inventory' ?>"> Inventory</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/dailysalesreport' ?>"> DailySales</a>
<br><br><br>
<h1>Inventory</h1>

<button id="btnAdd">Add New Product</button>
<a class="" href="<?php echo base_url()."Pos_controllers/inventory" ?>"> Refresh</a>
<br><br>
<body>


			
			<form class="form-horizontal">
				
				<table class="table-striped table-bordered table-hover myTable">
					<thead class="thead-dark">
						<tr>
							<th style="width: 120px;">Product Id</th>
							<th style="width: 120px;">Product Code</th>
							<th style="width: 150px">Product Name</th>
							<th style="width: 120px;">Price</th>
							<th style="width: 120px;">Qty</th>
							<th style="width: 120px;">Action</th>
						</tr>
					</thead>
					<tbody id="showdata">

					</tbody>

				</table>
			</form>
		</div>
</div>





<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<table class="table-striped table-bordered table-hover table-dark">
      		<thead>
	      		<tr>
	      		<th style="width: 150px;" class="text-center">Product Code</th>
	      		<th style="width: 150px;" class="text-center">Product Name</th>
	      		<th style="width: 100px; "class="text-center">Price</th>
	      		<th style="width: 50px; "class="text-center">Qty</th>

	      		</tr>
      		</thead>	
      		<tbody>
      			<tr>
      				<th><input id="productcode" type="text" class="form-control"name="txtProductcode"></th>
      				<th><input id="productname" type="text" class="form-control"name="txtProductname"></th>
      				<th><input id="price" type="text" class="form-control"  name="txtPrice"></th>
      				<th><input id="qty" type="number" class="form-control"name="txtQty"></th>
      			</tr>
      		</tbody>



      	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnSave" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="myForm" method="POST" action="<?php echo base_url().'Pos_controllers/update'?>">
      		<div class="form-group">
	       		<table class="table-striped table-bordered table-hover table-dark">
		      		<thead>
			      		<tr>
			      		<th style="width: 150px;" class="text-center">Product Code</th>
			      		<th style="width: 150px;" class="text-center">Product Name</th>
			      		<th style="width: 100px; "class="text-center">Price</th>
			      		<th style="width: 100px; "class="text-center">Qty</th>
			      		</tr>
		      		</thead>					
		      		<tbody>
		      			<tr>
		      				<input type="hidden" name="form_id" class="input-form_id">
		      				<th><input id="productcode" type="text" class="input_productcode form-control"name="productcode"></th>
		      				<th><input id="productname" type="text" class="input_productname form-control"name="productname"></th>
		      				<th><input id="price" type="number" class="input_price form-control"  name="price"></th>
		      				<th><input id="qty" type="number" class="input_qty form-control"name="qty"></th>
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



</body>
</html>

<script type="text/javascript">
var baseUrl = "<?php echo base_url() ?>";

$(function(){
	showAllData();

$('.myTable').on('click', '.btnEdit', function(){
$('#myModal1').modal('show');  
	var rowId = $(this).closest('tr').data('rowId');
	var row = $(`tr[data-row-id="${rowId}"`)
	var productname = row.find('.productname').text();
	var price = row.find('.price').text();
	var qty = row.find('.qty').text();
	var productcode = row.find('.productcode').text();
$('.input-form_id').val(rowId);
$('.input_productname').val(productname);
$('.input_price').val(price);
$('.input_qty').val(qty);
$('.input_productcode').val(productcode);

});

$('.myTable').on('click', '.btnDelete', function(){
var rowId = $(this).closest('tr').data('rowId');

$.ajax({
	url: baseUrl+'Pos_controllers/delete',
	method:'POST',
	dataType: JSON,
	data: {
		id : rowId
	}
	}).then(function(response){
				response = JSON.parse(response);

				if(response.success) {
					alert('Deleted!!');
				} else {
					alert('File not deleted!!');
				}

		});	
});


function showAllData(){
		$.ajax({
			url: baseUrl+'Pos_controllers/showAllData',
			method: 'POST',
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				// console.log('test', data);

				for(i=0; i<data.length; i++){
					html+= `<tr data-row-id="${data[i].id}">
								<th>${data[i].id}</th>
								<th class="productcode">${data[i].productcode}</th>
								<th class="productname">${data[i].productname}</th>
								<th class="price">${data[i].price}</th>
								<th class="qty">${data[i].qty}</th>
								<th>
								<a href="javascript:;" class=" btn-sm btn-info btnEdit">Edit</a>
								<a href="javascript:;" class=" btn-sm btn-danger btnDelete">Delete<a/>
								</th>
							</tr>`;

							
				}
				$('#showdata').html(html);
			},
			error: function(){
				alert('Didnt get the data from database!');
			}
		})

	}




});





$('#btnAdd').click(function(){
$('#myModal').modal('show');
});

$('#btnSave').click(function(){
var productcode = $('#productcode').val();
var productname = $('#productname').val();
var price = $('#price').val();
var qty = $('#qty').val();


 $.ajax({
	url: baseUrl+'Pos_controllers/save',
	method: 'post',
	data: {
			productcode : productcode,
			productname : productname ,
			price : price,
			qty : qty
		}
	}).then(function(response){
		response = JSON.parse(response);

		if(response.success) 
		{
			alert('Saved');
		} else {
			alert('Error');
		}	
	});
});

</script>