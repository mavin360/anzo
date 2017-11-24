<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('Gallery List <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('New Gallery <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>
</div>

<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($gallery,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
	
	<div class="form-group"><label class="col-sm-2 control-label"> Gallery Name </label> <?php echo $this->Form->control('gallery_name',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label"> Gallery Type </label><?php echo $this->Form->radio('gallery_option',[['value'=>'header_gallery','text'=>'  Header Page Gallery'],['value'=>'page_gallery','text'=>' Normal Page Gallery']],['label' => ['style' =>'padding:10px']]);?></div>
	<div class="form-group"><label class="col-sm-2 control-label"> Is Home </label><?php echo $this->Form->radio('is_home',[['value'=>'no','text'=>'  No'],['value'=>'yes','text'=>' Yes']],['label' => ['style' =>'padding:10px']]);?></div>
	
    <div class="form-group"><label class="col-sm-2 control-label">Gallery Description</label><?php echo $this->Form->control('gallery_desc',['class'=>'form-control','type'=>'textarea']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label"> Status </label><?php echo $this->Form->radio('status',[['value'=>'active','text'=>'  Active'],['value'=>'inactive','text'=>'  Inactive']],['label' => ['style' =>'padding:10px']]);?></div>
    <div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
		</div>
	</div>
    <?= $this->Form->end() ?>
	
</div>
</div>
