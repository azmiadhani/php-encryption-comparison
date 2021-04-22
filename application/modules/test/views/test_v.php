<?php

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die;
?>

<body>
	<?php
	echo " It takes " . $result['time'] . " seconds to execute the script" . "<br>";
	?>
	<button title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler') .style.display=='none') {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler') .style.display='none'}">Show/Hide</button>
	<div id="spoiler" style="display:none">
		<?php
		foreach ($result['data'] as $r) {
			echo $r['pilihan'] . "<br>";
			echo $r['encrypted'] . "<br>";
			echo $r['decrypted'];
			echo "<hr>";
		}
		?>
	</div>
</body>