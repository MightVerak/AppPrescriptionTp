<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrescriptionItem[]|\Cake\Collection\CollectionInterface $prescriptionItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prescription Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptionItems index large-9 medium-8 columns content">
    <h3><?= __('Prescription Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prescription_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medication_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prescriptionItems as $prescriptionItem): ?>
            <tr>
                <td><?= $this->Number->format($prescriptionItem->id) ?></td>
                <td><?= $prescriptionItem->has('prescription') ? $this->Html->link($prescriptionItem->prescription->id, ['controller' => 'Prescriptions', 'action' => 'view', $prescriptionItem->prescription->id]) : '' ?></td>
                <td><?= $prescriptionItem->has('medication') ? $this->Html->link($prescriptionItem->medication->id, ['controller' => 'Medications', 'action' => 'view', $prescriptionItem->medication->id]) : '' ?></td>
                <td><?= $this->Number->format($prescriptionItem->quantity) ?></td>
                <td><?= h($prescriptionItem->created) ?></td>
                <td><?= h($prescriptionItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prescriptionItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prescriptionItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prescriptionItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionItem->id)]) ?>
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
