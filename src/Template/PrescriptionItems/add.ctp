<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrescriptionItem $prescriptionItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prescription Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptionItems form large-9 medium-8 columns content">
    <?= $this->Form->create($prescriptionItem) ?>
    <fieldset>
        <legend><?= __('Add Prescription Item') ?></legend>
        <?php
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
