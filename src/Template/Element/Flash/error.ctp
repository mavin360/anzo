<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message error" onclick="this.classList.add('hidden');"></div>-->
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
	<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >×</button>-->
	<?= $message ?>
</div>