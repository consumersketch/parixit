
	$(document).ready(function(){
		
		//on client dropdown change
		$('#client').change(function(){
			
			var clientID=$('#client').val();
			//Call Ajax to get client products
			//On Success Fill products dropdown
			$.ajax({
					type: "POST",
					url:base_url+"filter/clientProducts",
					dataType: "json",
					data: "clientID="+clientID,
				})
			.done(function(data){
				    $('#product').html('<option value="">Select Product</option>');
					$.each(data, function(i, data){
						$('#product').append("<option value='"+data.product_id+"'>"+data.product_description+"</option>");
		            });
					if($('#client').val() == "")
					{
						$('#product').prop('disabled',true);
						$('#invoiceTable>tbody').html('<tr><td colspan="6" class="text-center">Please Select Options !!!<td></tr>');	
					}					
					else
					{
						$('#product').prop('disabled',false);	
					}
					
					
				})
			.fail(function(xhr, ajaxOptions, thrownError) {
				})
			.always(function() {
				});	
		});	
		
		//Submit formFilterInvoice Using Ajax
		$('form#formFilterInvoice').submit(function(e) {
		    var form = $(this);
		    e.preventDefault();

		    $.ajax({
		        type: "POST",
		        url: base_url+"filter/filterInvoice",
		        data: form.serialize(),
		        dataType: "html",
		    })
			.done(function(data){				   
					$('#invoiceTable>tbody').html(data);
				})
			.fail(function(xhr, ajaxOptions, thrownError) {
				})
			.always(function() {
				});	
		});		
		
	});
