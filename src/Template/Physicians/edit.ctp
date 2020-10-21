<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Physician $physician
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $physician->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $physician->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="physicians form large-9 medium-8 columns content">
    <?= $this->Form->create($physician) ?>
    <fieldset>
        <legend><?= __('Edit Physician') ?></legend>
        <?php
            echo $this->Form->control('address_id', ['options' => $addresses]);
            echo $this->Form->control('physician_name');
            echo $this->Form->control('details');
            echo $this->Form->control('customers._ids', ['options' => $customers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
