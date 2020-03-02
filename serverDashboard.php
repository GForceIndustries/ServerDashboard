<?php
// list of servers and ports to monitor
$serverports = array (

// example
// array("hostname",port,"description","URL"),
// array("hostname2",port2,"description2","URL2")

)
?>

<?php

// define page refresh time
$refreshtime = 5000;

?>

<?php

// define colours for port open or closed
$bgcolorportopen = "#00FF00";
$bgcolorportclosed = "#FF0000";

?>

<?php

// test if $port on $ip is open

function testport($ip, $port) {
    $socket = @fsockopen($ip, $port);
    if (!$socket) {
        return false;
    } else {
        fclose($socket);
        return true;
    }
}

?>

<?php

function tableRow($serverportrow) {
	
		global $bgcolorportopen;
		global $bgcolorportclosed;
	
		echo "<tr>";
	
		// server
		echo "<td>"; echo $serverportrow[0]; echo "</td>";
		
		// ip
		$serverip = gethostbyname($serverportrow[0]);
		echo "<td>"; echo $serverip; echo "</td>";
		
		// port		
		if (testport($serverip,$serverportrow[1])) {
			$portopen = true;
			echo "<td bgcolor='$bgcolorportopen'>";
		} else {
			$portopen = false;
			echo "<td bgcolor='$bgcolorportclosed'>";
		}
		
		if ($portopen and $serverportrow[3] != '') {
			echo "<a href='$serverportrow[3]' target='_blank'>$serverportrow[1]</a>";
		} else {
			echo $serverportrow[1];
		}
		
		echo "</td>";
		
		// description
		echo "<td>"; echo $serverportrow[2]; echo "</td>";
				
	echo "</tr>";
	echo "\n";

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Deep Space</title>
<style>
table,th,td {
	border: 1px solid black;
}
}
</style>
<script type="text/JavaScript">
	function AutoRefresh( t ) {
		setTimeout("location.reload(true);", t);
	}
</script>
</head>
<body onload="JavaScript:AutoRefresh(<?php echo $refreshtime; ?>);">

<div id="table">

<table>
<tr>
<th>Server</th>
<th>IP</th>
<th>Port</th>
<th>Description</th>
</tr>

<?php

foreach($serverports as $serverport) {
	
	tableRow($serverport);
	
}

?>

</table>

</div>

</body>
</html>
