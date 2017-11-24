<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('New Page <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('Edit Page <i class="fa fa-pencil"></i>'), ['action' => 'edit', $page->id],['escape' => false,'class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('List Pages <i class="fa fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?> 
</div>
</div>


<div class="panel-body panel-body-nopadding">
<?php //pr($page);?>
<div class="form-bordered">
<div class="form-group">
<label class="col-sm-2 control-label">Page Title</label>
<div class="col-sm-6"><?= h($page->page_title) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Page Slug</label>
<div class="col-sm-6"><?= h($page->page_slug) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Meta Title</label>
<div class="col-sm-6"><?= h($page->meta_title) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Meta Descriptions</label>
<div class="col-sm-6"><?= h($page->meta_descriptions) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Meta Keywords</label>
<div class="col-sm-6"><?= h($page->meta_keywords) ?></div>
</div>
<div class="form-group">
<div class="panel-heading" style="padding: 20px 10px;">
	<h3 class="panel-title col-sm-12" style="padding:0;">Header Image</h3>
	</div>
<label class="col-sm-2 control-label">Page Header Image</label>
<div class="col-sm-6">
<?php if($page->page_header_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/PagesImages/big/<?php echo h($page->page_header_image) ?>" width="300" height="150"><?php } ?>
</div>
</div>
<?php if(!empty($page->sections)){?>
<div class="form-group">
<div class="panel panel-default">
	<div class="panel-heading" style="padding: 20px 10px;">
		<h3 class="panel-title col-sm-12" style="padding:0;">Page Sections</h3>
	</div>
	<div id="panel-body" class="panel-body">
<?php $i=1; foreach($page->sections as $section){ ?>
		<span class="badge badge-primary"><?php echo $i++; ?></span>
		<div class="new-section">
		<div class="form-group">
		<strong class="col-sm-2 control-label">Section Title</strong>
		<div class="col-sm-6"><?php echo $section->section_title;?></div>
		</div>
		<div class="form-group">
		<strong class="col-sm-2 control-label">Section Description</strong>
		<div class="col-sm-9"><?php echo $section->section_text;?></div>
		</div>
		</div>
<?php }?>
	</div>
</div>
</div>
<?php }?>


<div class="form-group">
<label class="col-sm-2 control-label">Selected Module</label>
<div class="col-sm-6"><?= $page->selected_module?h($modules[$page->selected_module]):'NA' ?></div>
</div>  
<div class="form-group">
<label class="col-sm-2 control-label">Status</label>
<div class="col-sm-6"><?= h($page->status) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Added Date</label>
<div class="col-sm-6"><?= h($page->added_date) ?></div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Modify Date</label>
<div class="col-sm-6"><?= h($page->modify_date) ?></div>
</div>
</div>
</div>
</div>