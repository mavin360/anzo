<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
 use Cake\I18n\Time;
?>
<?php //pr($subscriptions);?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('added_date','Subscribe Date') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
			$i=1;
			foreach ($subscriptions as $subscription): ?>
            <tr>
                <td><?= $i++; ?></td>
				<td><?= h($subscription->email) ?></td>
				<td><?php $date=Time::parse($subscription->added_date); echo h($date->nice()); ?></td>
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