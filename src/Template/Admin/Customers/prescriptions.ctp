<h1>
	Customers prescriptions 
	<? $this->Text->toList(h($tags), 'ou') ?>
</h1>

<section>
<?php foreach ($customers as $customer): ?>
	<article>
		<h4><? $this->Html->link($customer->customer_name, ['controller' => 'Customers' , 'action' => 'view' , $customer->customer_name]) ?></h4>
	</article>
<?php endforeach; ?>
</section>