<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civilitee $civilitee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Civilitee'), ['action' => 'edit', $civilitee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Civilitee'), ['action' => 'delete', $civilitee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $civilitee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Civilitees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Civilitee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="civilitees view large-9 medium-8 columns content">
    <h3><?= h($civilitee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Civilite') ?></th>
            <td><?= h($civilitee->civilite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($civilitee->id) ?></td>
        </tr>
    </table>
</div>
