<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreLocation $storeLocation
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
       <?= $this->Html->link(__('Edit Store Location'), ['action' => 'edit', $storeLocation->id],['escape' => false,'class'=>'btn btn-primary']) ?> </li>
       <?= $this->Html->link(__('List Store Locations <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?> </li>
       <?= $this->Html->link(__('New Store Location <i class="fa  fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?> </li>
</div>
</div>

<div class="panel-body panel-body-nopadding">
<?php //pr($page);?>
<div class="form-bordered">
   
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Name</label>
		<div class="col-sm-9"><a href="#" class="basicInline" data-name="store_title" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_title) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Country</label>
		<div class="col-sm-6">
		<a href="#" id="country" data-type="select2" data-name="store_country" data-value="<?php echo $storeLocation->store_country;?>" data-pk="<?php echo $storeLocation->id; ?>" data-title="Select country"></a>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store City</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_city" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_city) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Address</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_address" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_address) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">PIN</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_pin" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_pin) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Image</label>
		<div class="col-sm-4">
		<?php if($storeLocation->store_image){?><img id="disImg" class="img-responsive" src="<?php echo $this->request->webroot; ?>img/StoresImages/big/<?php echo h($storeLocation->store_image) ?>" width="300" height="150"><?php } ?>
		</div>
		<div class="col-sm-4">
		<form action="<?php echo $this->request->webroot; ?>admin/store-locations/change_image" class="dropzone" id="storeImage">
			<div class="dz-message">Select or Drop a Image File for Change Store Image.</div>
            <div class="fallback">
              <input name="store_image" type="file" />
            </div>
          </form>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Lat</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_lat" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_lat) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Lon</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_lon" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_lon) ?></a></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Phone</label>
		<div class="col-sm-6"><a href="#" class="basicInline" data-name="store_phone" data-type="text" data-pk="<?php echo $storeLocation->id; ?>"><?= h($storeLocation->store_phone) ?></a></div>
	</div>
	<div class="panel panel-default">
<div class="panel-heading" style="padding: 20px 10px;">
		<h3 class="panel-title col-sm-12" style="padding:0;">Page Sections</h3>
	</div>
	<div id="panel-body" class="panel-body">
	<?php $i=1;  foreach($storeLocation->store_location_days_times as $section){ ?>
	<span class="badge badge-primary"><?php echo $i++; ?></span>
	<div class="form-group">
		<label class="col-sm-2 control-label">Store Open Days</label>
		<div class="col-sm-6">
		<a class="select" data-value="<?php echo $section->from_open_day;?>" data-name="from_open_day" data-pk="<?php echo $section->id; ?>" data-type="select"><?php echo $section->from_open_day;?></a>-
		<a class="select" data-value="<?php echo $section->to_open_day;?>" data-name="to_open_day" data-pk="<?php echo $section->id; ?>" data-type="select"><?php echo $section->to_open_day;?></a>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Store Open Time</label>
		<div class="col-sm-6">
		<a href="#" data-type="text" data-name="from_open_time" data-pk="<?php echo $section->id; ?>" class="time2" ><?php echo h($section->from_open_time);?></a>
		-<a href="#" data-type="text" data-name="to_open_time" data-pk="<?php echo $section->id; ?>" class="time2" ><?php echo h($section->to_open_time) ?></a></div>
	</div>
	<?php }?>
	</div>
</div>	
	
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-6">
		<a class="select-active" data-value="<?php echo $storeLocation->status;?>" data-name="status" data-pk="<?php echo $storeLocation->id; ?>" data-type="select">
		<?= h($storeLocation->status) ?>
		</a>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Added Date</label>
		<div class="col-sm-6"><?= h($storeLocation->added_date) ?></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Modify Date</label>
		<div class="col-sm-6"><?= h($storeLocation->modify_date) ?></div>
	</div>
</div>
</div>
</div>
<link href="<?php echo $this->request->webroot; ?>css/bootstrap-editable.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>css/dropzone.css" />
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-editable.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/moment.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/dropzone.min.js"></script>
<script>
$(function(){
	$('.basicInline').editable({
            mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/store-locations/field_edit'
        });
		
		var countries = [];
        $.each(<?php echo json_encode($countryArr);?>, function(k, v) {
            countries.push({id: k, text: v});
        });	
	$('#country').editable({
            inputclass: 'sel-xs',
			mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/store-locations/field_edit',
            source: countries,
            select2: {
                width: 200,
                placeholder: 'Select country',
                allowClear: true
            } 
        });
	$('.select').editable({
			mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/store-locations/field_edit_time',
            source: [
                     {value: "Sunday", text: "Sunday"},
                     {value: "Monday", text: "Monday"},
                     {value: "Tuseday", text: "Tuseday"},
					 {value: 'Wednesday', text:'Wednesday'},
					 {value: 'Thursday', text:'Thursday'},
					 {value: 'Friday', text:'Friday'},
					 {value: 'Saturday', text:'Saturday'}
                    ]
        });
		
		$('.time2').on('shown', function(e, editable) {
			//alert('initialized ' + editable.options.name);
			$('.store-time').parent().addClass('bootstrap-timepicker');
			$('.store-time').timepicker({minuteStep: 15});
		});
		$('.time2').editable({
			mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/store-locations/field_edit_time',
            inputclass: 'store-time'
        });
	$('.select-active').editable({
			mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/store-locations/field_edit',
            source: [
                     {value: "active", text: "Active"},
                     {value: "inactive", text: "Inactive"}
                    ]
        });	
});

Dropzone.options.storeImage = {
  paramName: "store_image",
  maxFilesize: 2, //MB
  params:{'id':<?php echo $storeLocation->id;?>},
  maxFiles:10,
  acceptedFiles:'image/*',
  url:'<?php echo $this->request->webroot; ?>admin/store-locations/change_image',
  success:function(data,XMLHttpRequest){
	//console.log(data);
	var res=JSON.parse(XMLHttpRequest);
	$('#disImg').attr('src','<?php echo $this->request->webroot; ?>img/StoresImages/big/'+res.name)
  }
};



</script>