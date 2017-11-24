<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
	<a href="<?php echo $this->request->webroot; ?>admin/jobs/add_cat" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-panel"> Add New Job Category <i class="fa  fa-plus"></i></a>
      
 </div>
</div>
</div>
<?php echo $this->Flash->render(); ?>  
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_name','Job Category Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($jobCategories as $jobCat): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><a href="#" class="basicInline" data-name="cat_name" data-type="text" data-pk="<?php echo $jobCat->id; ?>"><?php echo $jobCat->cat_name; ?></a></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'deletecat', $jobCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobCat->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
	<?php if($this->Paginator->counter('{{pages}}')>1){?>
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
	<?php }?>	
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
<div id="catAdd_modal" class="modal fade bs-example-modal-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"></div>
  </div>
</div>



<link href="<?php echo $this->request->webroot; ?>css/bootstrap-editable.css" rel="stylesheet">
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-editable.min.js"></script>
<script>
$(function(){
	$('.basicInline').editable({
            mode: 'inline',
			url: '<?php echo $this->request->webroot; ?>admin/jobs/cat_field_edit'
     });
});

	function add_new_cat(){
		if($('#cat-name').val()==''){
			$('#msg').html('Please Enter Category Name.');
		}else{
			$('#msg').html('');
			var data=$('#catAdd').serialize();
			$.ajax({
				method:'POST',
				url:'<?php echo $this->request->webroot; ?>admin/jobs/add_new_cat',
				data:data,
				beforeSend:function(){
					$('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i>');
					$('#submitBtn').attr('disabled',true);
				},
				success:function(res){
					$('#submitBtn').html('Submit');
					$('#submitBtn').attr('disabled',false);
					var res=JSON.parse(res);
					if(res.type=='success'){
						window.location.reload(true);
					}
					if(res.type=='error'){
					
					}
				}
			});
		}
	}
</script>
