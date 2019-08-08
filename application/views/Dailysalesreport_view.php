<html>
</<head>
    <title>DailySalesReport</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/logined' ?>"> Home</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/selling' ?>"> System</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/inventory' ?>"> Inventory</a>
<a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/dailysalesreport' ?>"> DailySales</a>

<body> 
<div class='col-sm-8 text-center'>
        <form class='form-group form-horizontal'>
        <caption>Daily Sales Report</caption>
            <div class='container-fluid bg-2 text-center'>
                <table class='table table-bordered text-center' id='product_list'>
                    <thead class='table-dark'>

                        <tr>
                            <th>
                                <label for="id">Id</label>
                            </th>
                            <th>
                                <label for="product code">Product Code</label>
                            </th>
                            <th>
                                 <label for="product name">Product Name</label> 
                            </th>
                            <th>
                                  <label for="qty">Qty</label>   
                            </th>
                            <th>
                                 <label for="unit price">Unit Price</label>  
                            </th>
                            <th>
                                  <label for="amount">Amount</label>
                            </th>
                            <th><a class="btn btn-primary" href="<?php echo base_url().'Pos_controllers/dailysalesreport' ?>"> Refresh</a></th>
                        </tr>
                    </thead>


                <tbody id='showdata'>

                </tbody>
                <tfoot>
 

                <!-- <th><a href="#" class="btn-sm btn-info btnTotal" id="btnTotal">Total</a></th> -->
                </tfoot>
                </table>
            </div>
        </form>  
</div>   
</body>

<footer>
    <div class='col-sm-8 text-center'>
        <form class='form-group form-horizontal'>
        <caption></caption>
            <div class='container-fluid bg-2 text-center'>
                <table class='table table-bordered text-center' id='product_list1'>
                    <thead class='table-dark'>
                        <tr>
                            <th colspan='2'>Product code</th>
                            <th>Cash on Hand</th>
                        </tr>
                    </thead>

                    <footer>
                        <tr>
                            <td>Product Code 1</td>
                            <td>Product Code 2</td>
                            <td id="totalamount1"></td>
                        </tr>
                    </footer>
                </table>
            </div>
        </form>
    </div>
</footer>
</html>

<script>
var baseUrl = "<?php echo base_url() ?>";





$(function(){
    // showTotal(); -- should be trigrd after the ajax since the values are from the db and got by using ajax

    
    function showTotal(){
        var rows = $('#product_list tbody').find('tr'); 
        var totalAmount = 0;

            // console.log(rows)
        $.each(rows, function(index, row) {
            var $row = $(row);
            totalAmount += parseFloat($row.find('.totalAmount').text().trim());
        }); 
        console.log(totalAmount);
        // console.log(deletebtn);
        $('#totalamount1').text(totalAmount);
        

    }


    
//     $('#btnTotal').click(function(){
//     var rows = $('#product_list tbody').find('tr'); 
//     var totalAmount = 0;

//         console.log(rows)
//     $.each(rows, function(index, row) {
//         var $row = $(row);
//         totalAmount += parseFloat($row.find('.totalAmount').text().trim());
//     }); 

//     $('#totalamount1').text(totalAmount);
    
// });
    showData();
      function showData(){
        $.ajax({
			url: baseUrl+'Pos_controllers/showData',
			method: 'POST',
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				// console.log('test', data);

				for(i=0; i<data.length; i++){
					html+= `<tr data-row-id="${data[i].id}">
								<td class='id'>${data[i].id}</td>
								<td>${data[i].procode}</td>
								<td>${data[i].pname}</td>
                                <td>${data[i].qty}</td>
								<td>${data[i].price}</td>
                                <td id='totalamount' class='totalamount'>${data[i].amount}</td>
                                <td> <button type='button' name='record' class='btnDelete btn-warning btn-xs'>Delete</td>																			
							</tr>`;
				}
				$('#showdata').html(html);
                showTotal();
			},
			error: function(){
				alert('Didnt get the data from database!');
			}
		})
    }
    
var total = 0;
    $('#product_list').on('click', '.btnDelete', function(event){
       var rows = $('#product_list tbody').find('tr');

        $.ajax({
		url: baseUrl+'Pos_controllers/delete1',
		method: 'POST',
		dataType: 'json',
		data: {
			id: rows.data('rowId')
		},
        success: function(aaa){
            console.log(aaa)
			if(aaa.success) {
                rows.remove();
                alert('deleted');
			}else{
                alert('Error Not deleted')
            }
        }

        });
        
       
    });
    
    // function deleteRow(row){
    //     row.remove();
    // }
});


</script>