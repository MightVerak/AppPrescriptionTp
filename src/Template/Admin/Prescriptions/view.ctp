<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prescription'), ['action' => 'edit', $prescription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prescription'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prescriptions view large-9 medium-8 columns content">
    <h3><?= h($prescription->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $prescription->has('customer') ? $this->Html->link($prescription->customer->id, ['controller' => 'Customers', 'action' => 'view', $prescription->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physician') ?></th>
            <td><?= $prescription->has('physician') ? $this->Html->link($prescription->physician->id, ['controller' => 'Physicians', 'action' => 'view', $prescription->physician->id]) : '' ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= $prescription->has('medication') ? $this->Html->link($prescription->medication->id, ['controller' => 'Medications', 'action' => 'view', $prescription->medication->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($prescription->details) ?></td>
        </tr>
    </table>
</div>
