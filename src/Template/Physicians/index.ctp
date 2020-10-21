<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Physician[]|\Cake\Collection\CollectionInterface $physicians
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="physicians index large-9 medium-8 columns content">
    <h3><?= __('Physicians') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('physician_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($physicians as $physician): ?>
            <tr>
                <td><?= $this->Number->format($physician->id) ?></td>
                <td><?= $physician->has('address') ? $this->Html->link($physician->address->id, ['controller' => 'Addresses', 'action' => 'view', $physician->address->id]) : '' ?></td>
                <td><?= h($physician->physician_name) ?></td>
                <td><?= h($physician->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $physician->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $physician->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $physician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $physician->id)]) ?>
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
