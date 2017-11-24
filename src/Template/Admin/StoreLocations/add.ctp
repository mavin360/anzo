<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreLocation $storeLocation
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
  <?= $this->Html->link(__('List Store Locations <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']); ?>
</div>
</div>
<?php ?>

<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($storeLocation,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
    <div class="form-group"><label class="col-sm-2 control-label">Store Name</label>
	<?php echo $this->Form->control('store_title',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Store Country</label>
	 <?php echo $this->Form->control('store_country',['options'=>$countryArr,'class'=>'form-control selectBox','data-placeholder'=>"Choose a Country..."]);?>
	</div>
	 <div class="form-group"><label class="col-sm-2 control-label">Store City</label>
	 <?php echo $this->Form->control('store_city',['class'=>'form-control']);?>
	</div>
	
	 <div class="form-group"><label class="col-sm-2 control-label">Store Address</label>
	 <?php  echo $this->Form->control('store_address',['class'=>'form-control']);?>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label">Pin</label>
	 <?php  echo $this->Form->control('store_pin',['class'=>'form-control']);?>
	</div>
	 <div class="form-group"><label class="col-sm-2 control-label">Store Image</label>
	 <?php  echo $this->Form->control('store_image',['class'=>'form-control','type'=>'file']);?>
	</div>
	 <div class="form-group"><label class="col-sm-2 control-label">Store Lat</label>
	 <?php  echo $this->Form->control('store_lat',['class'=>'form-control']);?>
	</div>
	 <div class="form-group"><label class="col-sm-2 control-label">Store Lon</label>
	 <?php  echo $this->Form->control('store_lon',['class'=>'form-control']);?>
	</div>
	 <div class="form-group"><label class="col-sm-2 control-label">Store Phone</label>
	 <?php echo $this->Form->control('store_phone',['class'=>'form-control']);?>
	</div>
	<div class="day_time_section">
	<div class="panel panel-default">
	<div class="panel-heading" style="padding: 20px 10px;">
	<h3 class="panel-title col-sm-12" style="padding:0;">Store Open Day Time</h3>
	</div>
	<div id="panel-body" class="panel-body">
	
	</div>
	<div class="panel-footer">
		<div class="col-sm-3">
			<a class="btn btn-info-alt" onclick="return new_day_time();">Add New Day Time <i class="fa  fa-plus"></i></a>
		</div>
	</div>
	</div>
	</div>
	
    <div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')); ?>
		</div>
	</div>
    <?= $this->Form->end(); ?>
</div>
</div>

<link rel="stylesheet" href="<?php echo $this->request->webroot; ?>css/bootstrap-timepicker.min.css" />
<script src="<?php echo $this->request->webroot; ?>js/select2.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-timepicker.min.js"></script>
<script>
$(function(){
	$(".selectBox").select2({
		width: '100%'
	  });
	$('.store-time').timepicker({minuteStep: 15});
});

function new_day_time(){
	var section='<div class="new-section"><div class="form-group"><label class="col-sm-2 control-label">Store Open Days</label><div class="col-sm-6" style="padding:0;"><div class="col-sm-6" style="padding:0;"><label class="col-sm-2 control-label">From</label><div class="bootstrap-timepicker col-sm-8"><select name="store_open_days_from[]" class="form-control" id="store-open-days-from"><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuseday">Tuseday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></div></div><div class="col-sm-6" style="padding:0;"><label class="col-sm-2 control-label">To</label><div class="bootstrap-timepicker col-sm-8"><select name="store_open_days_to[]" class="form-control" id="store-open-days-to"><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuseday">Tuseday</option><option value="Wednesday">Wednesday</option><option value="Thursday" >Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></div></div></div><a href="javascript:void(0)" class="panel-close" onClick="close_section(this);">×</a></div><div class="form-group"><label class="col-sm-2 control-label">Store Open Time</label><div class="col-sm-6" style="padding:0;"><div class="col-sm-6" style="padding:0;"><label class="col-sm-2 control-label">From</label><div class="bootstrap-timepicker col-sm-8"><input name="store_open_time_from[]" class="form-control store-time" maxlength="255" id="store-open-time-from" value="11:00 AM" type="text"></div></div>	 <div class="col-sm-6" style="padding:0;"><label class="col-sm-2 control-label">To</label><div class="bootstrap-timepicker col-sm-8"><input name="store_open_time_to[]" class="form-control store-time" maxlength="20" id="store-open-time-to" value="07:00 PM" type="text"></div></div></div></div></div>';
	$('#panel-body').append(section);
	$('.store-time').timepicker({minuteStep: 15});
}
function close_section(obj){
	$(obj).parent().parent().remove();
}
</script>
