<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
   <?php echo $this->Html->link(__('List Sliders <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>

<div class="panel-body panel-body-nopadding">
    <?= $this->Form->create($slider,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
        <div class="form-group"><label class="col-sm-2 control-label">Image Title</label><?php echo $this->Form->control('image_title',['class'=>'form-control']);?></div>
		<div class="form-group"><label class="col-sm-2 control-label"> Desktop Image </label> <?php echo $this->Form->control('desktop_image',['class'=>'form-control','type'=>'file']);?></div>
		<div class="form-group"><label class="col-sm-2 control-label"> Mobile Image </label><?php echo $this->Form->control('mobile_image',['class'=>'form-control','type'=>'file']);?></div>
		<div class="form-group"><label class="col-sm-2 control-label"> Image Link </label><?php echo $this->Form->control('image_link',['class'=>'form-control']);?></div>
		<div class="form-group"><label class="col-sm-2 control-label"> Image Index </label><?php echo $this->Form->control('image_index',['class'=>'form-control']);?></div>
	<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-3">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
	</div>
	</div>
    <?= $this->Form->end() ?>
</div>

</div>


