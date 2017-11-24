<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('New Gallery Image <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
 
</div>
</div>
</div>
<?php echo $this->Flash->render(); ?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('gallery_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gallery_option') ?></th>
                
				 <th scope="col"><?= $this->Paginator->sort('gallery_desc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
			$i=1;
			foreach ($galleries as $gallery): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
				<?php if($gallery->gallery_name){?><?php echo h($gallery->gallery_name) ?><?php } ?>
				</td>
				<td><?php if($gallery->gallery_option=='header_gallery'){echo 'Header Page Gallery';}else{echo 'Normal Page Gallery';} ?></td>
				<td><?= h($gallery->gallery_desc) ?></td>
                <td><?= h($gallery->status) ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
					<?= $this->Html->link(__('Add Images'), ['action' => 'add-image', $gallery->id]) ?>
					<?= $this->Html->link(__('All Images'), ['action' => 'image-index', $gallery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id]) ?>
					 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]) ?>
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

