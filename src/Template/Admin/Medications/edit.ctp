<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $medication
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $medication->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $medication->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="medications form large-9 medium-8 columns content">
    <?= $this->Form->create($medication) ?>
    <fieldset>
        <legend><?= __('Edit Medication') ?></legend>
        <?php
            echo $this->Form->control('medication');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
