<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCategory[]|\Cake\Collection\CollectionInterface $subCategories
 */
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns" style="display: inline-block; width: 100%;">
<?= $this->Html->link(__('New Sub Category'), ['action' => 'add_sub_category'],['class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index'],['class'=>'btn btn-primary']) ?>
<?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add'],['class'=>'btn btn-primary']) ?>
</div>		  
</div>
</div>
<?php echo $this->Flash->render(); ?>
<div class="table-responsive">
    <table class="table mb30 table-danger">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?= $this->Paginator->sort('category.category_title','Parent Category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_title') ?></th>
                <th scope="col">Sub Category Image</th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_desc') ?></th>
				<th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($subCategories as $subCategory): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $subCategory->has('category') ? $this->Html->link($subCategory->category->category_title, ['controller' => 'Categories', 'action' => 'all_sub_categories',$subCategory->category->id]) : '' ?></td>
                <td><?= h($subCategory->sub_category_title) ?></td>
                <td>
				<?php if($subCategory->sub_category_image){?><img class="img-responsive" src="<?php echo $this->request->webroot; ?>img/SubCategoriesImages/small/<?php echo h($subCategory->sub_category_image) ?>" width="100"><?php } ?>
				</td>
                <td><?= h($subCategory->sub_category_desc) ?></td>
				      <td><?= $subCategory->sort_order?h($subCategory->sort_order):'NA' ?></td>
                <td><?= h($subCategory->status) ?></td>
               
                <td class="actions">
                    <?php //echo $this->Html->link(__('View'), ['action' => 'view', $subCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit-sub-category', $subCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete-sub-category', $subCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
