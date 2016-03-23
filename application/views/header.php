<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" type="text/css"  />

<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<?php
if(isset($js))
{ 
	foreach($js as $loop_js)
	{
?>
<script type="text/javascript" src="<?php echo base_url('assets').'/'.$loop_js; ?>"></script>
<?php
	}
}
?>

<script type="text/javascript">
	var base_url= "<?php echo base_url();?>";
</script>

<title><?php echo $page_title;?></title>

  
</head>

<body>

<div class="header">
	<h3 class="text-center" style="color: #000;">Filter Invoice</h3>
</div>

