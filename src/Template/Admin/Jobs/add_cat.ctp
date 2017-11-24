<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>

<div class="panel panel-dark panel-alt">
    <div class="panel-heading">
        <div class="panel-btns">
            <a class="panel-close" data-dismiss="modal" aria-hidden="true">&times;</a>
        </div><!-- panel-btns -->
        <h3 class="panel-title">Add New Job Category</h3>
        
    </div>
    <div class="panel-body">
       <?= $this->Form->create($jobCategory,['class'=>'form-horizontal form-bordered','id' => 'catAdd']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
	<div class="form-group"><label class="col-sm-4 control-label">Job Category Name</label><?php echo $this->Form->control('cat_name',['class'=>'form-control']);?></div>
	<div class="form-group">
	<div class="col-sm-4"></div>
	<div class="col-sm-3">
    <?= $this->Form->button(__('Submit'),array('id'=>'submitBtn','class'=>'btn btn-success btn-block','type'=>'button','onClick'=>'add_new_cat();')) ?>
	</div>
	</div>
    <?= $this->Form->end() ?>
	<div id="msg" class="error"></div>
    </div>
</div>