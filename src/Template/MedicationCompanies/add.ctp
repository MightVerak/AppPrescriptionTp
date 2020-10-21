<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicationCompany $medicationCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medication Companies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="medicationCompanies form large-9 medium-8 columns content">
    <?= $this->Form->create($medicationCompany) ?>
    <fieldset>
        <legend><?= __('Add Medication Company') ?></legend>
        <?php
            echo $this->Form->control('company');
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
