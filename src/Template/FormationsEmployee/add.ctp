<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsEmployee $formationsEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations Employee'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsEmployee form large-9 medium-8 columns content">
    <?= $this->Form->create($formationsEmployee) ?>
    <fieldset>
        <legend><?= __('Add Formations Employee') ?></legend>
        <?php
            echo $this->Form->control('employee_id', ['options' => $employees]);
            echo $this->Form->control('formation_id', ['options' => $formations]);
            echo $this->Form->control('date_executee', ['empty' => true]);
            echo $this->Form->control('proof_id', ['options' => $proofs, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
