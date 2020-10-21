<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersPhysician $customersPhysician
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customersPhysician->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customersPhysician->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers Physicians'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersPhysicians form large-9 medium-8 columns content">
    <?= $this->Form->create($customersPhysician) ?>
    <fieldset>
        <legend><?= __('Edit Customers Physician') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('physician_id', ['options' => $physicians]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
