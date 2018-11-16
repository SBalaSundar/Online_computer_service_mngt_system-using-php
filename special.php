<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['q']);
if($q==1){ 
	echo '<p><select name="special" id="spcial" required>
	<option value="">Specialization Area</option>
	<option value="eng">CCTV</option>
	<option value="client">Computer Hardware</option>
    <option value="client">Computer Software</option>
	<option value="client">Mobile phones</option>
	<option value="client">Electricals</option>
    <option value="client">Electronics</option>
	<option value="client">Networking</option>
    <option value="client">Web</option>
    <option value="client">Server Management</option>
    </select></p>';  } ?>
</body>
</html>
