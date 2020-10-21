<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicationCompany $medicationCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medication Company'), ['action' => 'edit', $medicationCompany->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medication Company'), ['action' => 'delete', $medicationCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicationCompany->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medication Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medication Company'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medicationCompanies view large-9 medium-8 columns content">
    <h3><?= h($medicationCompany->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($medicationCompany->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($medicationCompany->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medicationCompany->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($medicationCompany->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($medicationCompany->modified) ?></td>
        </tr>
    </table>
</div>
