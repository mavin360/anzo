<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>

<div class="panel panel-default">
<!--<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
        <?php //pr($settings);?>
       <?php //echo $this->Html->link(__('Edit Settings'), ['action' => 'edit'],['escape' => false,'class'=>'btn btn-primary']) ?> </li>
  </div>
</div>-->

<div class="panel-body panel-body-nopadding">
<?php //pr($settings);?>
<div class="form-bordered">
   
	<div class="form-group">
		<label class="col-sm-2 control-label">Help Phone</label>
		<div class="col-sm-9"><a href="#" class="basicInline" data-name="help_phone" data-type="text" data-pk="1"><?= $settings[0]->help_phone?h($settings[0]->help_phone):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Help Phone (Other)</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="help_phone_1" data-type="text" data-pk="1"><?= $settings[0]->help_phone_1?h($settings[0]->help_phone_1):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Help Email</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="help_email" data-type="text" data-pk="1"><?= $settings[0]->help_email?h($settings[0]->help_email):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Facebook URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="fb_url" data-type="text" data-pk="1"><?= $settings[0]->fb_url?h($settings[0]->fb_url):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Twitter URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="twitter_url" data-type="text" data-pk="1"><?= $settings[0]->twitter_url?h($settings[0]->twitter_url):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Intagram URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="instagram_url" data-type="text" data-pk="1"><?= $settings[0]->instagram_url?h($settings[0]->instagram_url):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Linkedin URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="linkedin_url" data-type="text" data-pk="1"><?= $settings[0]->linkedin_url?h($settings[0]->linkedin_url):'NA' ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">App URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="app_url" data-type="text" data-pk="1"><?= $settings[0]->app_url?h($settings[0]->app_url):'NA' ?></a></div>
	</div>
		<div class="form-group">
		<label class="col-sm-2 control-label">Order Online URL</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="order_online_url" data-type="text" data-pk="1"><?= $settings[0]->order_online_url?h($settings[0]->order_online_url):'NA' ?></a></div>
	</div>
</div>
</div>
</div>
<link href="<?php echo $this->request->webroot; ?>css/bootstrap-editable.css" rel="stylesheet">
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-editable.min.js"></script>
<script>
var crsf='<?php echo $this->request->getParam('_csrfToken');?>';
$(function(){
	$('.basicInline').editable({
            mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/settings/field_edit',
			params:{'_csrfToken':crsf}
        });
});
</script>