<?php

$listEncryption = [
	'aes-128-cbc' => 'aes-256-cbc',
	'aes-256-cbc' => 'aes-256-cbc',
	'camellia-128-cbc' => 'camellia-128-cbc',
	'camellia-256-cbc' => 'camellia-256-cbc',
];

?>

<body>
	Encryption Option : <br>
	<?php foreach ($listEncryption as $key => $le) { ?>
		<button onclick="location.href=`<?= base_url('test/index/') . $le ?>`"><?= $key ?></button>
	<?php } ?>
	<hr>
</body>
<script>

</script>