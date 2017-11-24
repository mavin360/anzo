<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
  <?= $this->Html->link(__('List Jobs'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
  <?= $this->Html->link(__('List Job Categories'), ['controller' => 'Jobs', 'action' => 'jobsCategories'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>
</div>
<div class="panel-body panel-body-nopadding">
    <?php echo $this->Form->create($job,['class'=>'form-horizontal form-bordered']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
		<div class="form-group"><label class="col-sm-2 control-label">Job Category</label>
			<?php echo $this->Form->control('job_category_id',['options' => $jobCategories,'class'=>'form-control']);?>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Job Title</label>
			<?php echo $this->Form->control('job_title',['class'=>'form-control']);?>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Job Type</label>
		<?php echo $this->Form->radio('job_type',[['value'=>'Part Time','text'=>'  Part Time'],['value'=>'Full Time','text'=>'  Full Time']],['label' => ['style' =>'padding:10px']]);?>
			<?php //echo $this->Form->control('job_type',['class'=>'form-control']);?>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Job State</label>
			<?php echo $this->Form->control('job_state',['class'=>'form-control']);?>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Job City</label>
			<?php echo $this->Form->control('job_city',['class'=>'form-control']);?>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Job Description</label>
			<?php echo $this->Form->control('job_description',['class'=>'form-control','type'=>'textarea']);?>
		</div>
        <div class="form-group"><label class="col-sm-2 control-label">Status</label><?php echo $this->Form->radio('status',[['value'=>'active','text'=>'  Active'],['value'=>'inactive','text'=>'  Inactive']],['label' => ['style' =>'padding:10px']]);?></div>
   <div class="form-group">
	<div class="col-sm-2"></div>
   <div class="col-sm-3">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
	</div>
	</div>
     <?= $this->Form->end() ?>
</div>
</div>
