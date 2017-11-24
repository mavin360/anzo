<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('Add Image <i class="fa fa-plus"></i>'), ['action' => 'add-image',$gid],['escape' => false,'class'=>'btn btn-primary']) ?>
 
</div>
</div>
</div>
<?php echo $this->Flash->render(); 

?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('','Gallery Name'); ?></th>
				<th scope="col"><?= $this->Paginator->sort('image'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_title','Image Title'); ?></th>
				 <th scope="col"><?= $this->Paginator->sort('image_desc','Image Description'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
			$i=1;
			foreach ($galleryImages as $gallery): ?>
            <tr>
                <td><?= $i++;?></td>
				<td><?= $gallery->gallery->gallery_name;?></td>
				<td><?php if($gallery->image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/GalleriesImages/small/<?php echo h($gallery->image) ?>" width="100"><?php } ?></td>
                <td>
				<?php if($gallery->image_title){?><?php echo h($gallery->image_title) ?><?php } ?>
				</td>
				
				<td><?= h($gallery->image_desc) ?></td>
                <td><?= h($gallery->status) ?></td>
                <td class="actions">
                    <?php /*$this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id]) ?>
					 <?= $this->Html->link(__('Add Images'), ['action' => 'add-image', $gallery->id]) */?>
					 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete_image', $gallery->id], ['confirm' => __('Are you sure you want to delete?', $gallery->id)]) ?>
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

