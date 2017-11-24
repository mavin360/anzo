<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sliders view large-9 medium-8 columns content">
    <h3><?= h($slider->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image Title') ?></th>
            <td><?= h($slider->image_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desktop Image') ?></th>
            <td><?= h($slider->desktop_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Image') ?></th>
            <td><?= h($slider->mobile_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Link') ?></th>
            <td><?= h($slider->image_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($slider->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Index') ?></th>
            <td><?= $this->Number->format($slider->image_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($slider->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Added Date') ?></th>
            <td><?= h($slider->added_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modify Date') ?></th>
            <td><?= h($slider->modify_date) ?></td>
        </tr>
    </table>
</div>
