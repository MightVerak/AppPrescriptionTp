<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrescriptionItem $prescriptionItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prescription Item'), ['action' => 'edit', $prescriptionItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prescription Item'), ['action' => 'delete', $prescriptionItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prescription Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prescriptionItems view large-9 medium-8 columns content">
    <h3><?= h($prescriptionItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prescription') ?></th>
            <td><?= $prescriptionItem->has('prescription') ? $this->Html->link($prescriptionItem->prescription->id, ['controller' => 'Prescriptions', 'action' => 'view', $prescriptionItem->prescription->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= $prescriptionItem->has('medication') ? $this->Html->link($prescriptionItem->medication->id, ['controller' => 'Medications', 'action' => 'view', $prescriptionItem->medication->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prescriptionItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($prescriptionItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($prescriptionItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($prescriptionItem->modified) ?></td>
        </tr>
    </table>
</div>
