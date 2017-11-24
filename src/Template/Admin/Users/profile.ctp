<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


?>
<div class="row">
<div class="col-sm-12">
<?php //pr($Auth->user());?>
	<div class="profile-header">
		<h2 class="profile-name"><a href="#" class="basicInline" data-name="first_name" data-type="text" data-pk="<?php echo $Auth->user('id'); ?>"><?php echo h($Auth->user('first_name'))?></a> <a href="#" class="basicInline" data-name="last_name" data-type="text" data-pk="<?php echo $Auth->user('id'); ?>"><?php echo h($Auth->user('last_name')); ?></a></h2>
		<div class="profile-location"><i class="fa fa-envelope"></i> <a href="#" class="basicInline" data-name="email" data-type="text" data-pk="<?php echo $Auth->user('id'); ?>"><?php echo h($Auth->user('email'));?></a></div>
		<!--<div class="profile-position"><i class="fa fa-users"></i> </div>-->
		<div class="mb20"></div>
		<ul class="nav nav-tabs nav-profile">
          <li class="active"><a href="#activities" data-toggle="tab"><strong>Change Password</strong></a></li>
        </ul>
		<div class="tab-content">
		<div class="tab-pane active" id="activities">
		 <?= $this->Form->create($user,['id'=>'userPass','class'=>'form-horizontal form-bordered']);
			$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
			?>
			<div class="form-group" style="border-top:none;"><label class="col-sm-2 control-label">New Password <span class="asterisk">*</span></label>
			<?php echo $this->Form->control('password',['class'=>'form-control','placeholder'=>'New Password']);?>
			</div>
			<div class="form-group"><label class="col-sm-2 control-label">Retype New Password <span class="asterisk">*</span></label>
			<?php echo $this->Form->control('re_password',['class'=>'form-control','placeholder'=>'Retype New Password','type'=>'password']);?>
			</div>
			<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('id'=>'submitBtn','class'=>'btn btn-success btn-block','type'=>'button','onClick'=>'change_pass();')) ?>
			</div>
			
			</div>
			<div id="msg"></div>
		 </div>
		</div>
		
	</div><!-- profile-header -->
</div>
</div>
<link href="<?php echo $this->request->webroot; ?>css/bootstrap-editable.css" rel="stylesheet">
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-editable.min.js"></script>
<script>
$(function(){
	$('.basicInline').editable({
            mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/users/user_field_edit'
     });
});

function change_pass(){
	var data=$('#userPass').serialize();
	$.ajax({
				method:'POST',
				url:'<?php echo $this->request->webroot; ?>admin/users/change_pass',
				data:data,
				beforeSend:function(){
					$('#msg').html('');
					$('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i>');
					$('#submitBtn').attr('disabled',true);
				},
				success:function(res){
					$('#submitBtn').html('Submit');
					$('#submitBtn').attr('disabled',false);
					var res=JSON.parse(res);
					if(res.type=='success'){
						$('#msg').addClass('success');
						$('#msg').html(res.msg);
						$('#re-password').val('');
						$('#password').val('');
					}
					if(res.type=='error'){
						$('#msg').addClass('error');
						$('#msg').html(res.msg);
					}
				}
			});
}
</script>