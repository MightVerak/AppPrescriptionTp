<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prescription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptionitems'), ['controller' => 'PrescriptionItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescriptionitem'), ['controller' => 'PrescriptionItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($prescription) ?>
    <fieldset>
        <legend><?= __('Edit Prescription') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('physician_id', ['options' => $physicians]);
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
