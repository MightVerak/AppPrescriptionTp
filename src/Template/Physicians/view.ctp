<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Physician $physician
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Physician'), ['action' => 'edit', $physician->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Physician'), ['action' => 'delete', $physician->id], ['confirm' => __('Are you sure you want to delete # {0}?', $physician->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="physicians view large-9 medium-8 columns content">
    <h3><?= h($physician->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $physician->has('address') ? $this->Html->link($physician->address->id, ['controller' => 'Addresses', 'action' => 'view', $physician->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physician Name') ?></th>
            <td><?= h($physician->physician_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($physician->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($physician->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($physician->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($physician->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($physician->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Customer Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($physician->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->user_id) ?></td>
                <td><?= h($customers->address_id) ?></td>
                <td><?= h($customers->customer_name) ?></td>
                <td><?= h($customers->slug) ?></td>
                <td><?= h($customers->created) ?></td>
                <td><?= h($customers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prescriptions') ?></h4>
        <?php if (!empty($physician->prescriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Physician Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($physician->prescriptions as $prescriptions): ?>
            <tr>
                <td><?= h($prescriptions->id) ?></td>
                <td><?= h($prescriptions->customer_id) ?></td>
                <td><?= h($prescriptions->physician_id) ?></td>
                <td><?= h($prescriptions->details) ?></td>
                <td><?= h($prescriptions->created) ?></td>
                <td><?= h($prescriptions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
