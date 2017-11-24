<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('New Item <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
 <?= $this->Html->link(__('List Categories <i class="fa  fa-list"></i>'), ['controller' => 'Categories', 'action' => 'index'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Category <i class="fa fa-plus"></i>'), ['controller' => 'Categories', 'action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Sub Categories <i class="fa  fa-list"></i>'), ['controller' => 'Categories','action' => 'list_subcategories'],['escape' => false,'class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Sub Category <i class="fa fa-plus"></i>'), ['controller' => 'Categories', 'action' => 'add-sub-category'],['escape' => false,'class'=>'btn btn-primary']) ?> 
</div>
</div>
</div>
<?php echo $this->Flash->render(); ?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_image') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('product_desc') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
			$i=1;
			foreach ($items as $item): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $item->category->category_title ?></td>
                <td><?= $item->sub_category->sub_category_title ?></td>
                <td><?= h($item->product_title) ?></td>
                <td>
				<?php if($item->product_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/ProductsImages/small/<?php echo h($item->product_image) ?>" width="100"><?php } ?>
				</td>
				<td><?= h($item->product_desc) ?></td>
				<td><?= h($item->sort_order) ?></td>
                <td><?= h($item->status) ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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

