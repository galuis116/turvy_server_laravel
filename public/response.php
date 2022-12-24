<?php
	header("content-type: text/xml");

	$name = $_GET['pId'];
?>
<Response>	
	<Dial><?php echo $name; ?></Dial>
</Response>