<div id="container" class="mrgt80 container">
<?php
echo form_open('filter/filterInvoice','id="formFilterInvoice" name="formFilterInvoice"');
?>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label class="control-label" for="relativeDate">Relative Date</label>
			<select class="form-control" name="relativeDate" id="relativeDate" required>
			   <option value="">Select Relative Date</option>	
	           <option value="lastMonthToDate">Last Month To Date</option>
	           <option value="thisMonth">This Month</option>
	           <option value="thisYear">This Year</option>
	           <option value="lastYear">Last Year</option>
	        </select>
	  	</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label class="control-label" for="client">Client</label>
			<select class="form-control"  name="client" id="client" required>
	            <option value="">Select Client</option>
				<?php
				foreach($clients as $client)
				{
				?>
				<option value="<?php echo $client->client_id; ?>" ><?php echo $client->client_name; ?></option>
				<?php
				}
				?>
	        </select>
	  	</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label class="control-label" for="product">Product</label>
			<select class="form-control" id="product" name="product" disabled required>
	          <option value="">Select Product</option>
	        </select>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="form-group text-center">
			<input type="submit" name="submit" value="Submit" class="btn btn-default"/>
		</div>
	</div>
</div>

<?php
echo form_close();
?>

<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped table-hover " id="invoiceTable">
		  <thead>
		    <tr>
		      <th>Invoice Num</th>
		      <th>Invoice Date</th>
		      <th>Product</th>
		      <th>Qty</th>
			  <th>Price</th>
			  <th>Total</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td colspan="6" class="text-center">Please Select Options !!!</td>
		      
		    </tr>		    	    
		  </tbody>
		</table> 
	</div>
</div>


</div>