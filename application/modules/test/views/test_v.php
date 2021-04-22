<?php

$this->view('test_menu_v');

?>
<style>
	td {
		text-align: center;
		vertical-align: middle;
	}
</style>

<body>
	RESULT : <br>
	<table border="1">
		<thead>
			<th>Data</th>
			<th>Loop</th>
			<th>Avg Encrypt Time</th>
			<th>Avg Decrypt Time</th>
		</thead>
		<tbody>
			<tr>
				<td><?= $numberOfData ?></td>
				<td><?= $loopCount ?></td>
				<td><?= $encryptTimeAverage ?></td>
				<td><?= $decryptTimeAverage ?></td>
			</tr>
		</tbody>
	</table>
	<?php
	// echo " It takes " . $result['time'] . " seconds to execute the script" . "<br>";
	// echo " Data count : $numberOfData<br>";
	?>
	<!-- <button title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler') .style.display=='none') {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler') .style.display='none'}">Show/Hide</button> -->
	<hr>
	<!-- <div id="spoiler" style="display:none"> -->
	<?php
	// foreach ($result['data'] as $r) {
	// 	echo $r['pilihan'] . "<br>";
	// 	echo $r['encrypted'] . "<br>";
	// 	echo $r['decrypted'];
	// 	echo "<hr>";
	// }
	?>
	<!-- </div> -->
</body>