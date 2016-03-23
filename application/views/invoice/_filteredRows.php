<?php
if(count($invoices)>0)
{
foreach($invoices as $invoice)
{
?>
<tr>
  <td><?php echo $invoice->invoice_num; ?></td>
  <td><?php echo $invoice->invoice_date; ?></td>
  <td><?php echo $invoice->product_description; ?></td>
  <td><?php echo $invoice->qty; ?></td>
  <td><?php echo $invoice->price; ?></td>
  <td><?php echo ($invoice->qty)*($invoice->price); ?></td>
</tr>
<?php	
}	
}
else
{
?>
<tr>
	<td colspan="6" class="text-center"><?php echo "No Data Found !!!"; ?></td>	
</tr>
<?php	
}
?>

