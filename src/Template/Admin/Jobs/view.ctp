<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
	<?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id],['escape' => false,'class'=>'btn btn-primary']) ?> 
	<?= $this->Html->link(__('List Jobs'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
	<?= $this->Html->link(__('New Job'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?> 
	<?= $this->Html->link(__('List Job Categories'), ['controller' => 'Jobs', 'action' => 'jobsCategories'],['escape' => false,'class'=>'btn btn-primary']) ?> 

    </div>
</div>
<div class="panel-body panel-body-nopadding">
<?php //pr($page);?>
<div class="form-bordered">

		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job Category') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_category') ? $job->job_category->cat_name  : '' ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job Title') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_title') ? $job->job_title  : '' ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job Type') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_type') ? $job->job_type  : '' ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job State') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_state') ? $job->job_state  : '' ?>
			</div>
		</div>
	<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job City') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_city') ? $job->job_city  : '' ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job Description') ?></label>
			<div class="col-sm-9">
			<?= $job->has('job_description') ? $job->job_description  : '' ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Job Status') ?></label>
			<div class="col-sm-9">
			<?= $job->has('status') ? $job->status  : '' ?>
			</div>
		</div>
   <div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Added Date') ?></label>
			<div class="col-sm-9">
			<?= $job->has('added_date') ? $job->added_date  : '' ?>
			</div>
		</div>
       <div class="form-group">
			<label class="col-sm-2 control-label"><?= __('Modify Date') ?></label>
			<div class="col-sm-9">
			<?= $job->has('modify_date') ? $job->modify_date  : '' ?>
			</div>
		</div> 
</div>
</div>
</div>