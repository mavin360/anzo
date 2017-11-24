<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCategory $subCategory
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
	<?= $this->Html->link(__('List Sub Categories <i class="fa  fa-list"></i>'), ['controller' => 'Categories','action' => 'list_subcategories'],['escape' => false,'class'=>'btn btn-primary']) ?>
   <?php echo $this->Html->link(__('List Categories <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
   <?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>

<div class="panel-body panel-body-nopadding">
<?php //pr($categories);?>

 <?= $this->Form->create($subCategory,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
		]);
	?>
	<div class="form-group"><label class="col-sm-2 control-label">Parent Category</label><?php echo $this->Form->control('category_id',['options' => $categories,'class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Sub Category Title</label><?php echo $this->Form->control('sub_category_title',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label"> Sub Category Image </label> <?php echo $this->Form->control('sub_category_image',['class'=>'form-control','type'=>'file']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Sub Category Description</label><?php echo $this->Form->control('sub_category_desc',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Sub Category Sort Order</label><?php echo $this->Form->control('sort_order',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Sub Category Display Layout</label>
	<?php
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-2">{{content}}</div>',
					'label'=>false
				]);
	$layoutType=['circular'=>'Circular','rectangle'=>'Rectangle'];
	$colType=['two_col'=>'Two Column','three_col'=>'Three Column','four_col'=>'Four Column'];
	echo $this->Form->control('layout_style',['options' => $layoutType,'class'=>'form-control']);
	echo $this->Form->control('layout_col',['options' => $colType,'class'=>'form-control']);
	?>
	(This is based on the design style followed on the front end)
	</div>
	<!--<div class="form-group"><label class="col-sm-2 control-label">Display Layout column</label><?php //echo $this->Form->radio('layout_col',[['value'=>'two_col','text'=>'  Two Column'],['value'=>'three_col','text'=>'  Three Column'],['value'=>'four_col','text'=>'  Four Column']],['label' => ['style' =>'padding:10px']]);?>
	(This is based on the design style followed on the front end)
	</div>-->
	<div class="form-group">
	<div class="col-sm-2"></div>
   <div class="col-sm-3">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
	</div>
	</div>
    <?= $this->Form->end() ?>
</div>
</div>
