<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreLocation[]|\Cake\Collection\CollectionInterface $storeLocations
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
       <?= $this->Html->link(__('New Store Location <i class="fa  fa-plus"></i>'),['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
 </div>
</div>
</div>
<?php echo $this->Flash->render(); 
//pr($storeLocations);
?>  
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_title','Store Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_phone') ?></th>
            <?php /*?>    <th scope="col"><?= $this->Paginator->sort('store_open_days_from','Store Open Days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_open_time_from','Store Open Time') ?></th><?php */?> 
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($storeLocations as $storeLocation): 
			
			?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= h($storeLocation->store_title) ?></td>
                <td><?= h($storeLocation->store_city) ?></td>
				<td>
				<?php if($storeLocation->store_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/StoresImages/small/<?php echo h($storeLocation->store_image); ?>" width="100"><?php } ?>
				</td>
                <td><?= h($storeLocation->store_phone) ?></td>
				 <?php /*?>
                <td><?= h($storeLocation->store_open_days_from).'</br>'.h($storeLocation->store_open_days_to) ?></td>
                <td><?= h($storeLocation->store_open_time_from).'</br>'.h($storeLocation->store_open_time_to) ?></td>
				 <?php */?>
                <td><?= h($storeLocation->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storeLocation->id]); ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storeLocation->id]); ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storeLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeLocation->id)]) ?>
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
