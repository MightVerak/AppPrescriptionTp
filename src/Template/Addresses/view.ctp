<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number Building') ?></th>
            <td><?= h($address->number_building) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Street') ?></th>
            <td><?= h($address->number_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area Locality') ?></th>
            <td><?= h($address->area_locality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($address->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($address->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State Province') ?></th>
            <td><?= h($address->state_province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($address->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($address->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($address->customer_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($address->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($address->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($address->customers)): ?>
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
            <?php foreach ($address->customers as $customers): ?>
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
        <h4><?= __('Related Physicians') ?></h4>
        <?php if (!empty($address->physicians)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Physician Name') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->physicians as $physicians): ?>
            <tr>
                <td><?= h($physicians->id) ?></td>
                <td><?= h($physicians->address_id) ?></td>
                <td><?= h($physicians->physician_name) ?></td>
                <td><?= h($physicians->details) ?></td>
                <td><?= h($physicians->created) ?></td>
                <td><?= h($physicians->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Physicians', 'action' => 'view', $physicians->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Physicians', 'action' => 'edit', $physicians->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Physicians', 'action' => 'delete', $physicians->id], ['confirm' => __('Are you sure you want to delete # {0}?', $physicians->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
