<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
   <?php echo $this->Html->link(__('List Categories <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>
<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($category,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
	<div class="form-group"><label class="col-sm-2 control-label">Category Title</label><?php echo $this->Form->control('category_title',['class'=>'form-control']);?></div>
	
	<!--<div class="form-group"><label class="col-sm-2 control-label"> Category Image </label> <?php //echo $this->Form->control('category_image',['class'=>'form-control','type'=>'file']);?></div>-->
	<div class="form-group"><label class="col-sm-2 control-label">Category Description</label><?php echo $this->Form->control('category_desc',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Category Sort Order</label><?php echo $this->Form->control('sort_order',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Show Category Numbering</label><?php echo $this->Form->radio('show_no',[['value'=>'yes','text'=>' Yes'],['value'=>'no','text'=>'  No']],['label' => ['style' =>'padding:10px']]);?></div>
   <div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-3">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
	</div>
	</div>
    <?= $this->Form->end() ?>
</div>
