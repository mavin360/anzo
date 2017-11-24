<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $item->has('category') ? $this->Html->link($item->category->id, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category') ?></th>
            <td><?= $item->has('sub_category') ? $this->Html->link($item->sub_category->id, ['controller' => 'SubCategories', 'action' => 'view', $item->sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Title') ?></th>
            <td><?= h($item->product_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image') ?></th>
            <td><?= h($item->product_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($item->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Added Date') ?></th>
            <td><?= h($item->added_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modify Date') ?></th>
            <td><?= h($item->modify_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Product Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($item->product_desc)); ?>
    </div>
</div>
