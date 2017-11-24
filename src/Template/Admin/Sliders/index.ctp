<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider[]|\Cake\Collection\CollectionInterface $sliders
 */
?>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
   <?= $this->Html->link(__('New Slider <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false,'class'=>'btn btn-primary']) ?>
</div>		  
</div>
</div>
<?php echo $this->Flash->render(); ?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?= $this->Paginator->sort('image_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desktop_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($sliders as $slider): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= h($slider->image_title) ?></td>
                <td><?php if($slider->desktop_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/SlidersDesktopImages/small/<?= h($slider->desktop_image) ?>" width="100"><?php } ?></td>
                <td><?php if($slider->mobile_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/SlidersMobileImages/small/<?php } ?><?= h($slider->mobile_image) ?>" width="100"></td>
                <td><?= h($slider->image_link) ?></td>
                <td><?= $this->Number->format($slider->image_index) ?></td>
                <td><?= h($slider->status) ?></td>
                <td class="actions">
                    <?php //echo $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $slider->id],['escape' => false]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slider->id]) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $slider->id],['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]); ?>
					
					
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
	<?php if($this->Paginator->counter('{{pages}}')>1){
		?>
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
