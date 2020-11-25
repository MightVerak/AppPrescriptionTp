<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink( __('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'nav-link'] ) ?></li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Category') ?></th>
                <td><?= h($category->category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($category->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Medications') ?></h4>
        <?php if (!empty($category->medications)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Prescription Id') ?></th>
                    <th scope="col"><?= __('Category Id') ?></th>
                    <th scope="col"><?= __('Medication') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($category->medications as $medications): ?>
                <tr>
                    <td><?= h($medications->id) ?></td>
                    <td><?= h($medications->prescription_id) ?></td>
                    <td><?= h($medications->category_id) ?></td>
                    <td><?= h($medications->medication) ?></td>
                    <td><?= h($medications->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Medications', 'action' => 'view', $medications->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Medications', 'action' => 'edit', $medications->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Medications', 'action' => 'delete', $medications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medications->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
