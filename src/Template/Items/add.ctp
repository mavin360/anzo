<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('sub_category_id', ['options' => $subCategories]);
            echo $this->Form->control('product_title');
            echo $this->Form->control('product_image');
            echo $this->Form->control('product_desc');
            echo $this->Form->control('status');
            echo $this->Form->control('added_date');
            echo $this->Form->control('modify_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
