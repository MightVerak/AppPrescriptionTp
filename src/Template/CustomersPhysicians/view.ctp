<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersPhysician $customersPhysician
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Physician'), ['action' => 'edit', $customersPhysician->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Physician'), ['action' => 'delete', $customersPhysician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersPhysician->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Physicians'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Physician'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersPhysicians view large-9 medium-8 columns content">
    <h3><?= h($customersPhysician->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customersPhysician->has('customer') ? $this->Html->link($customersPhysician->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersPhysician->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physician') ?></th>
            <td><?= $customersPhysician->has('physician') ? $this->Html->link($customersPhysician->physician->id, ['controller' => 'Physicians', 'action' => 'view', $customersPhysician->physician->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customersPhysician->id) ?></td>
        </tr>
    </table>
</div>
