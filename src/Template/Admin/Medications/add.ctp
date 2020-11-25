<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $medication
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
		"controller" => "Medications",
		"action" => "getByCategory",
		"_ext" => "json"
			]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Medications/add_edit', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Medications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="medications form large-9 medium-8 columns content">
    <?= $this->Form->create($medication) ?>
    <fieldset>
        <legend><?= __('Add Medication') ?></legend>
        <?php
			echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('medication', ['options' => [__('Choisir une category')]]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
