<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersPhysician[]|\Cake\Collection\CollectionInterface $customersPhysicians
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Physician'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersPhysicians index large-9 medium-8 columns content">
    <h3><?= __('Customers Physicians') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('physician_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersPhysicians as $customersPhysician): ?>
            <tr>
                <td><?= $this->Number->format($customersPhysician->id) ?></td>
                <td><?= $customersPhysician->has('customer') ? $this->Html->link($customersPhysician->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersPhysician->customer->id]) : '' ?></td>
                <td><?= $customersPhysician->has('physician') ? $this->Html->link($customersPhysician->physician->id, ['controller' => 'Physicians', 'action' => 'view', $customersPhysician->physician->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersPhysician->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersPhysician->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersPhysician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersPhysician->id)]) ?>
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
