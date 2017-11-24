<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
 <div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('Settings <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>
</div>
<?php //pr($setting);?>
<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($setting,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
   <div class="form-group"><label class="col-sm-2 control-label">Help Phone</label>
	<?php echo $this->Form->control('help_phone',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Help Phone (Other)</label>
	<?php echo $this->Form->control('help_phone_1',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Help Email</label>
	<?php echo $this->Form->control('help_email',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Facebook URL</label>
	<?php echo $this->Form->control('fb_url',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Twitter URL</label>
	<?php echo $this->Form->control('twitter_url',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Instagram URL</label>
	<?php echo $this->Form->control('instagram_url',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Linkedin URL</label>
	<?php echo $this->Form->control('linkedin_url',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">App URL</label>
	<?php echo $this->Form->control('app_url',['class'=>'form-control']);?>
	</div>
    
     <div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')); ?>
		</div>
	</div>
    <?= $this->Form->end() ?>
</div>
</div>