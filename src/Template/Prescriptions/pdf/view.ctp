<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>

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
            <th scope="row"><?= __('Medication') ?></th>
            <td><?= $prescription->has('medication') ? $this->Html->link($prescription->medication->id, ['controller' => 'Medications', 'action' => 'view', $prescription->medication->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($prescription->details) ?></td>
        </tr>
    </table>
</div>
