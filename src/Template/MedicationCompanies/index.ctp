<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicationCompany[]|\Cake\Collection\CollectionInterface $medicationCompanies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Medication Company'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="medicationCompanies index large-9 medium-8 columns content">
    <h3><?= __('Medication Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicationCompanies as $medicationCompany): ?>
            <tr>
                <td><?= $this->Number->format($medicationCompany->id) ?></td>
                <td><?= h($medicationCompany->company) ?></td>
                <td><?= h($medicationCompany->details) ?></td>
                <td><?= h($medicationCompany->created) ?></td>
                <td><?= h($medicationCompany->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $medicationCompany->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medicationCompany->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medicationCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicationCompany->id)]) ?>
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
