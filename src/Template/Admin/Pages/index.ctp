<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('New Page <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>
</div>
</div>
<?php echo $this->Flash->render(); ?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_header_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('selected_module') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($pages as $page): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= h($page->page_title) ?></td>
                <td><?= h($page->page_slug) ?></td>
                <td>
				<?php if($page->page_header_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/PagesImages/small/<?php echo h($page->page_header_image) ?>" width="100"><?php } ?>
				</td>
                <td><?= $page->selected_module?h($modules[$page->selected_module]):'NA' ?></td>
                <td><?= h($page->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $page->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $page->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
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
	<?php } ?>	
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

