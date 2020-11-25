<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concentration $concentration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $concentration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $concentration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Concentrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concentrations form large-9 medium-8 columns content">
    <?= $this->Form->create($concentration) ?>
    <fieldset>
        <legend><?= __('Edit Concentration') ?></legend>
        <?php
            echo $this->Form->control('medication_id', ['options' => $medications, 'empty' => true]);
            echo $this->Form->control('concentration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
