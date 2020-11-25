<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription[]|\Cake\Collection\CollectionInterface $prescriptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prescription'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptions index large-9 medium-8 columns content">
    <h3><?= __('Prescriptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('physician_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prescriptions as $prescription): ?>
            <tr>
                <td><?= $prescription->has('customer') ? $this->Html->link($prescription->customer->id, ['controller' => 'Customers', 'action' => 'view', $prescription->customer->id]) : '' ?></td>
                <td><?= $prescription->has('physician') ? $this->Html->link($prescription->physician->id, ['controller' => 'Physicians', 'action' => 'view', $prescription->physician->id]) : '' ?></td>
                <td><?= h($prescription->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prescription->id]) ?>
					<?= $this->Html->link('PDF', ['action' => 'view', $prescription->id . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prescription->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id)]) ?>
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
