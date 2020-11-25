<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<?php
$urlToMedicationsAutoCompleteJson = $this->Url->build([
		"controller" => "Admin/Medications",
		"action" => "findMedications",
		"_ext" => "json"
			]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToMedicationsAutoCompleteJson . '";', ['block' => true]);
echo $this->Html->script('Prescriptions/add_edit/medicationAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($prescription) ?>
    <fieldset>
        <legend><?= __('Add Prescription') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('physician_id', ['options' => $physicians]);
			echo $this->Form->control('medication_id', ['label' => __('Medication'), 'type' => 'text', 'id' => 'autocomplete']);
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
