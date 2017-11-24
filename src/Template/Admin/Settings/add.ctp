<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="settings form large-9 medium-8 columns content">
    <?= $this->Form->create($setting) ?>
    <fieldset>
        <legend><?= __('Add Setting') ?></legend>
        <?php
            echo $this->Form->control('help_phone');
            echo $this->Form->control('help_phone_1');
            echo $this->Form->control('help_email');
            echo $this->Form->control('fb_url');
            echo $this->Form->control('twitter_url');
            echo $this->Form->control('instagram_url');
            echo $this->Form->control('linkedin_url');
            echo $this->Form->control('app_url');
            echo $this->Form->control('added_date');
            echo $this->Form->control('modify_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
