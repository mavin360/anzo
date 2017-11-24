<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('List Items <i class="fa  fa-list"></i>'), ['action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('New Item <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
 <?= $this->Html->link(__('List Categories <i class="fa  fa-list"></i>'), ['controller' => 'Categories', 'action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Category <i class="fa fa-plus"></i>'), ['controller' => 'Categories', 'action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Sub Categories <i class="fa  fa-list"></i>'), ['controller' => 'Categories','action' => 'list_subcategories'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Sub Category <i class="fa fa-plus"></i>'), ['controller' => 'Categories', 'action' => 'add-sub-category'],['escape' => false,'class'=>'btn btn-primary']) ?> 
</div>
</div>

<div class="panel-body panel-body-nopadding">
 <?= $this->Form->create($item,['class'=>'form-horizontal form-bordered','enctype' => 'multipart/form-data']);
		$this->Form->templates([
					'inputContainer' => '<div class="col-sm-6">{{content}}</div>',
					'label'=>false
				]);
	?>
	
	<div class="form-group"><label class="col-sm-2 control-label">Item Category</label><?php echo $this->Form->control('category_id',['options' => $categories,'class'=>'form-control','onChange'=>'return findsubcategories(this);']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label">Item Sub Category</label><?php echo $this->Form->control('sub_category_id', ['options' =>$subCategories,'class'=>'form-control']);?></div>
        <div class="form-group"><label class="col-sm-2 control-label">Item Title</label><?php  echo $this->Form->control('product_title',['class'=>'form-control']);?></div>
	
	<div class="form-group"><label class="col-sm-2 control-label"> Item Image </label> <?php echo $this->Form->control('product_image_new',['class'=>'form-control','type'=>'file']);?>
	<div class="col-sm-3">
	<?php echo $this->Form->control('product_image',['type'=>'hidden']);?>
	<?php if($item->product_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php 	echo h($item->product_image) ?>" width="100"><?php } ?>
	</div>
	</div>
	
    <div class="form-group"><label class="col-sm-2 control-label">Item Description</label><?php echo $this->Form->control('product_desc',['class'=>'form-control']);?></div>
   <div class="form-group"><label class="col-sm-2 control-label">Item Sort Order</label><?php echo $this->Form->control('sort_order',['class'=>'form-control']);?></div>
	<div class="form-group"><label class="col-sm-2 control-label"> Item Status </label><?php echo $this->Form->radio('status',[['value'=>'active','text'=>'  Active'],['value'=>'inactive','text'=>'  Inactive']],['label' => ['style' =>'padding:10px']]);?></div>
    <div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success btn-block')) ?>
		</div>
	</div>
    <?= $this->Form->end() ?>
	<script type="text/javascript">	
		function findsubcategories(){
				var category_id=$('#category-id').val();
				$.ajax({
					url:'<?php echo $this->request->webroot; ?>admin/Items/findsubcategories/',
					method:'POST',
					data:'cat_id='+category_id,
					success:function(data){
						var data=JSON.parse(data);
						if(data.data){
							$('#sub-category-id').html(data.data);
							$("#sub-category-id option[value=<?php echo $item->sub_category_id;?>]").attr('selected','selected');
						}
					}
				});
				
			}
	</script>
	
</div>
</div>
