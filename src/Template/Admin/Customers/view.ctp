<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prescriptions'), ['controller' => 'Prescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prescription'), ['controller' => 'Prescriptions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Physicians'), ['controller' => 'Physicians', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Physician'), ['controller' => 'Physicians', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $customer->has('user') ? $this->Html->link($customer->user->number_street, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $customer->has('address') ? $this->Html->link($customer->address->id, ['controller' => 'Addresses', 'action' => 'view', $customer->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Name') ?></th>
            <td><?= h($customer->customer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($customer->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
	<h1>Uploaded Files</h1>
	<div class="content">
		<!-- Table -->
		<table class="table">
			<tr>
				<th width="5%">#</th>
				<th width="20%">File</th>
				<th width="12%">Upload Date</th>
			</tr>
			<?php if($filesRowNum > 0):$count = 0; foreach($files as $file): $count++;?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><?php echo $this->Html->image($file->path.$file->name, [
							"alt" => $file->name,
							"width" => "220px",
							"height" => "150px",
							'url' => [$file->id]
							]);
						?>
				</td>
				<td><?php echo $file->created; ?></td>
			</tr>
			<?php endforeach; else:?>
			<tr><td colspan="3">No file(s) found......</td>
			<?php endif; ?>
		</table>
	</div>
    <div class="related">
        <h4><?= __('Related Physicians') ?></h4>
        <?php if (!empty($customer->physicians)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->physicians as $physicians): ?>
            <tr>
                <td><?= h($physicians->id) ?></td>
                <td><?= h($physicians->address_id) ?></td>
                <td><?= h($physicians->details) ?></td>
                <td><?= h($physicians->created) ?></td>
                <td><?= h($physicians->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Physicians', 'action' => 'view', $physicians->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Physicians', 'action' => 'edit', $physicians->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Physicians', 'action' => 'delete', $physicians->id], ['confirm' => __('Are you sure you want to delete # {0}?', $physicians->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prescriptions') ?></h4>
        <?php if (!empty($customer->prescriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Physician Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->prescriptions as $prescriptions): ?>
            <tr>
                <td><?= h($prescriptions->id) ?></td>
                <td><?= h($prescriptions->customer_id) ?></td>
                <td><?= h($prescriptions->physician_id) ?></td>
                <td><?= h($prescriptions->details) ?></td>
                <td><?= h($prescriptions->created) ?></td>
                <td><?= h($prescriptions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
