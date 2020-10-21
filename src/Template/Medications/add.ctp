<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $medication
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medicationcompanies'), ['controller' => 'Medicationcompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicationcompany'), ['controller' => 'Medicationcompanies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptionitems'), ['controller' => 'Prescriptionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescriptionitem'), ['controller' => 'Prescriptionitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medications form large-9 medium-8 columns content">
    <?= $this->Form->create($medication) ?>
    <fieldset>
        <legend><?= __('Add Medication') ?></legend>
        <?php
            echo $this->Form->control('company_id', ['options' => $medicationcompanies]);
            echo $this->Form->control('medication');
            echo $this->Form->control('cost');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
