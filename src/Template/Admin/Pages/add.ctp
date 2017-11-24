<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('List Pages <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>

<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($page,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
	<div class="form-group"><label class="col-sm-2 control-label">Page Title</label><?php  echo $this->Form->control('page_title',['class'=>'form-control','onkeyup'=>'slug_gen();', 'onblur'=>'slug_gen();']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Page Slug</label><?php  echo $this->Form->control('page_slug',['class'=>'form-control']);?> (Auto Generated. You Can Change It.)</div>
		<div class="form-group"><label class="col-sm-2 control-label">Meta Title</label><?php  echo $this->Form->control('meta_title',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Meta Descriptions</label><?php  echo $this->Form->control('meta_descriptions',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Meta Keywords</label><?php  echo $this->Form->control('meta_keywords',['class'=>'form-control']);?></div>
	
	
	<div class="form-group">
	<div class="panel-heading" style="padding: 20px 10px;">
	<h3 class="panel-title col-sm-12" style="padding:0;">Header Image</h3>
	</div>
	<label class="col-sm-2 control-label"> Header Image </label> <?php echo $this->Form->control('page_header_image',['class'=>'form-control','type'=>'file']);?></div>
	
	<div class="form-group">
	<div class="panel panel-default">
	<div class="panel-heading" style="padding: 20px 10px;">
	<h3 class="panel-title col-sm-12" style="padding:0;">Page Sections</h3>
	</div>
	<div id="panel-body" class="panel-body">
	
	</div>
	
	<div class="panel-footer">
		
		<div class="col-sm-3">
			<a class="btn btn-info-alt" onClick="return new_section();">Add New Section <i class="fa  fa-plus"></i></a>
		</div>
	</div>
	</div>
	</div>
	<div class="form-group">
	<div class="panel-heading" style="padding: 20px 10px;">
	<h3 class="panel-title col-sm-12" style="padding:0;">Page Module</h3>
	</div>
	<label class="col-sm-2 control-label">Select Module</label><?php
	$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	echo $this->Form->control('selected_module',['options' => $modules,'class'=>'form-control','onChange'=>'module();']);?>
	</div>
	<div id="mID">
	</div>
    <!--<div class="form-group"><label class="col-sm-2 control-label"> Module Order </label><?php //echo $this->Form->radio('module_sort_order',[['value'=>'first','text'=>'  In First'],['value'=>'last','text'=>'  In Last']],['label' => ['style' =>'padding:10px']]);?></div> -->   

   <div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
		</div>
	</div>
    <?= $this->Form->end() ?>
	<div class="result">
	</div>
</div>
</div>

<script src="<?php echo $this->request->webroot; ?>js/ckeditor/ckeditor.js"></script>
<script src="<?php echo $this->request->webroot; ?>js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
$(function(){
	 //jQuery('.text-editor').wysihtml5({color: true,html:true});
	 $('.text-editor').ckeditor();
});

function new_section(){
	var section='<div class="new-section"><div class="form-group" style="border-top: 1px solid #d3d7db;"><label class="col-sm-2 control-label">Section Title</label><div class="col-sm-6"><input name="pageSections[section_title][]" class="form-control" id="section-title" type="text" required="required"></div><a href="javascript:void(0)" class="panel-close" onClick="close_section(this);">×</a></div><div class="form-group"><label class="col-sm-2 control-label">Section Descriptions</label><div class="col-sm-9"><textarea name="pageSections[section_text][]" class="form-control text-editor" id="section-text" rows="5"></textarea></div></div></div>';
	$('#panel-body').append(section);
	$('.text-editor').ckeditor();
}

function close_section(obj){
	$(obj).parent().parent().remove();
}

function slug_gen(){
	var txt_val=$('#page-title').val();
	txt_val=txt_val.replace(/ /g,"-").toLowerCase();
	$('#page-slug').val(txt_val);
}

function module(){
	var mval=$('#selected-module').val();
	if(mval=='gallery'){
		$('#mID').html('<div class="form-group"><label class="col-sm-2 control-label">Select Module Name</label><?php echo $this->Form->control('module_id',['options' =>$allGalleries,'class'=>'form-control']);?></div>');
	}else{
		$('#mID').html('');
	}
}

</script>
