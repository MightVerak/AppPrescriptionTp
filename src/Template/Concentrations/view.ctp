<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concentration $concentration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Concentration'), ['action' => 'edit', $concentration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Concentration'), ['action' => 'delete', $concentration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concentration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Concentrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Concentration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="concentrations view large-9 medium-8 columns content">
    <h3><?= h($concentration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= $concentration->has('medication') ? $this->Html->link($concentration->medication->id, ['controller' => 'Medications', 'action' => 'view', $concentration->medication->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concentration') ?></th>
            <td><?= h($concentration->concentration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($concentration->id) ?></td>
        </tr>
    </table>
</div>
