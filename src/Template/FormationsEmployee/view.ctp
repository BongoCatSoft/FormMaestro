<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsEmployee $formationsEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formations Employee'), ['action' => 'edit', $formationsEmployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formations Employee'), ['action' => 'delete', $formationsEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsEmployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations Employee'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationsEmployee view large-9 medium-8 columns content">
    <h3><?= h($formationsEmployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $formationsEmployee->has('employee') ? $this->Html->link($formationsEmployee->employee->FullName, ['controller' => 'Employees', 'action' => 'view', $formationsEmployee->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $formationsEmployee->has('formation') ? $this->Html->link($formationsEmployee->formation->name, ['controller' => 'Formations', 'action' => 'view', $formationsEmployee->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proof') ?></th>
            <td><?= $formationsEmployee->has('proof') ? $this->Html->link($formationsEmployee->proof->id, ['controller' => 'Proofs', 'action' => 'view', $formationsEmployee->proof->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationsEmployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Executee') ?></th>
            <td><?= h($formationsEmployee->date_executee) ?></td>
        </tr>
    </table>
</div>
