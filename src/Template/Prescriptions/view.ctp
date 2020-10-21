<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prescription'), ['action' => 'edit', $prescription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prescription'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptionitems'), ['controller' => 'PrescriptionItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescriptionitem'), ['controller' => 'PrescriptionItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prescriptions view large-9 medium-8 columns content">
    <h3><?= h($prescription->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $prescription->has('customer') ? $this->Html->link($prescription->customer->id, ['controller' => 'Customers', 'action' => 'view', $prescription->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physician') ?></th>
            <td><?= $prescription->has('physician') ? $this->Html->link($prescription->physician->id, ['controller' => 'Physicians', 'action' => 'view', $prescription->physician->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($prescription->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prescription->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($prescription->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($prescription->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Prescription Items') ?></h4>
        <?php if (!empty($prescription->prescriptionitems)): ?>
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
            <?php foreach ($prescription->prescriptionitems as $prescriptionitems): ?>
            <tr>
                <td><?= h($prescriptionitems->id) ?></td>
                <td><?= h($prescriptionitems->prescription_id) ?></td>
                <td><?= h($prescriptionitems->medication_id) ?></td>
                <td><?= h($prescriptionitems->quantity) ?></td>
                <td><?= h($prescriptionitems->created) ?></td>
                <td><?= h($prescriptionitems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PrescriptionItems', 'action' => 'view', $prescriptionitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PrescriptionItems', 'action' => 'edit', $prescriptionitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrescriptionItems', 'action' => 'delete', $prescriptionitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
