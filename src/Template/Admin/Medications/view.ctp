<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $medication
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medication'), ['action' => 'edit', $medication->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medication'), ['action' => 'delete', $medication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medication->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medication'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medications view large-9 medium-8 columns content">
    <h3><?= h($medication->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= h($medication->medication) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($medication->description) ?></td>
        </tr>
        <tr>
    </table>
</div>
