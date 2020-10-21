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
        <li><?= $this->Html->link(__('List Medicationcompanies'), ['controller' => 'Medicationcompanies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medicationcompany'), ['controller' => 'Medicationcompanies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptionitems'), ['controller' => 'Prescriptionitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescriptionitem'), ['controller' => 'Prescriptionitems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medications view large-9 medium-8 columns content">
    <h3><?= h($medication->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Medicationcompany') ?></th>
            <td><?= $medication->has('medicationcompany') ? $this->Html->link($medication->medicationcompany->id, ['controller' => 'Medicationcompanies', 'action' => 'view', $medication->medicationcompany->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= h($medication->medication) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= h($medication->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($medication->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medication->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($medication->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($medication->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Prescriptionitems') ?></h4>
        <?php if (!empty($medication->prescriptionitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Prescription Id') ?></th>
                <th scope="col"><?= __('Medication Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($medication->prescriptionitems as $prescriptionitems): ?>
            <tr>
                <td><?= h($prescriptionitems->id) ?></td>
                <td><?= h($prescriptionitems->prescription_id) ?></td>
                <td><?= h($prescriptionitems->medication_id) ?></td>
                <td><?= h($prescriptionitems->quantity) ?></td>
                <td><?= h($prescriptionitems->created) ?></td>
                <td><?= h($prescriptionitems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prescriptionitems', 'action' => 'view', $prescriptionitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptionitems', 'action' => 'edit', $prescriptionitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptionitems', 'action' => 'delete', $prescriptionitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
