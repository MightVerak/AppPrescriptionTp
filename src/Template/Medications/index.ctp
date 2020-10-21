<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication[]|\Cake\Collection\CollectionInterface $medications
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medicationcompanies'), ['controller' => 'Medicationcompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medicationcompany'), ['controller' => 'Medicationcompanies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prescriptionitems'), ['controller' => 'Prescriptionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prescriptionitem'), ['controller' => 'Prescriptionitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medications index large-9 medium-8 columns content">
    <h3><?= __('Medications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medication') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medications as $medication): ?>
            <tr>
                <td><?= $this->Number->format($medication->id) ?></td>
                <td><?= $medication->has('medicationcompany') ? $this->Html->link($medication->medicationcompany->id, ['controller' => 'Medicationcompanies', 'action' => 'view', $medication->medicationcompany->id]) : '' ?></td>
                <td><?= h($medication->medication) ?></td>
                <td><?= h($medication->cost) ?></td>
                <td><?= h($medication->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medication->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medication->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medication->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
