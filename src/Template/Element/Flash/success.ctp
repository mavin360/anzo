<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message success" onclick="this.classList.add('hidden')"></div>-->
<div class="alert alert-success" onclick="this.classList.add('hidden')">
	<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
	<?= $message ?>
</div>
