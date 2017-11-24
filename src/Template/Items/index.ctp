<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('added_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modify_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= $item->has('category') ? $this->Html->link($item->category->id, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></td>
                <td><?= $item->has('sub_category') ? $this->Html->link($item->sub_category->id, ['controller' => 'SubCategories', 'action' => 'view', $item->sub_category->id]) : '' ?></td>
                <td><?= h($item->product_title) ?></td>
                <td><?= h($item->product_image) ?></td>
                <td><?= h($item->status) ?></td>
                <td><?= h($item->added_date) ?></td>
                <td><?= h($item->modify_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
