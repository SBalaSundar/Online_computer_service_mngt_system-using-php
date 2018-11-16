<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['q']);
if($q==1){ 
	echo '<p>Specialization Area<select name="special" id="spcial">
	<option value="">Specialization</option>
	<option value="CCTV">CCTV</option>
	<option value="Computer Hardware">Computer Hardware</option>
    <option value="Computer Software">Computer Software</option>
	<option value="Mobile">Mobile Phones</option>
	<option value="Electricals">Electricals</option>
	<option value="Electronics">Electronics</option>
            </select></p>';  } ?>
</body>
</html>
