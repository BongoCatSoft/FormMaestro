<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPosition $formationsPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formations Position'), ['action' => 'edit', $formationsPosition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formations Position'), ['action' => 'delete', $formationsPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPosition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations Position'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationsPosition view large-9 medium-8 columns content">
    <h3><?= h($formationsPosition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $formationsPosition->has('position') ? $this->Html->link($formationsPosition->position->name, ['controller' => 'Positions', 'action' => 'view', $formationsPosition->position->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $formationsPosition->has('formation') ? $this->Html->link($formationsPosition->formation->name, ['controller' => 'Formations', 'action' => 'view', $formationsPosition->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proof') ?></th>
            <td><?= $formationsPosition->has('proof') ? $this->Html->link($formationsPosition->proof->id, ['controller' => 'Proofs', 'action' => 'view', $formationsPosition->proof->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Formation') ?></th>
            <td><?= h($formationsPosition->status_formation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationsPosition->id) ?></td>
        </tr>
    </table>
</div>
