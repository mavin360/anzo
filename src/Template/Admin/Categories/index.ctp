<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
   <?= $this->Html->link(__('New Category <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>
</div>
<?php echo $this->Flash->render(); ?>

<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                 <th scope="col">#</th>
                <th scope="col"><?= $this->Paginator->sort('category_title') ?></th>
               <!-- <th scope="col"><?php //echo $this->Paginator->sort('category_image') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('category_desc') ?></th>
				<th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($categories as $category): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= h($category->category_title) ?></td>
                <!--<td><?php //if($category->category_image){?><img class="img-responsive" src="<?php //echo $this->request->webroot; ?>img/CategoriesImages/small/<?php //h($category->category_image) ?>" width="100"><?php //} ?></td>-->
				<td><?= h($category->category_desc) ?></td>
				<td><?= h($category->sort_order) ?></td>
                <td><?= h($category->status) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
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
