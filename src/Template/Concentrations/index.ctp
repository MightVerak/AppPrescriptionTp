<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concentration[]|\Cake\Collection\CollectionInterface $concentrations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Concentration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['controller' => 'Medications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medication'), ['controller' => 'Medications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concentrations index large-9 medium-8 columns content">
    <h3><?= __('Concentrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medication_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concentration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($concentrations as $concentration): ?>
            <tr>
                <td><?= $this->Number->format($concentration->id) ?></td>
                <td><?= $concentration->has('medication') ? $this->Html->link($concentration->medication->id, ['controller' => 'Medications', 'action' => 'view', $concentration->medication->id]) : '' ?></td>
                <td><?= h($concentration->concentration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $concentration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $concentration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $concentration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concentration->id)]) ?>
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
