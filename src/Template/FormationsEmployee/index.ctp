<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsEmployee[]|\Cake\Collection\CollectionInterface $formationsEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formations Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsEmployee index large-9 medium-8 columns content">
    <h3><?= __('Formations Employee') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_executee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proof_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formationsEmployee as $formationsEmployee): ?>
            <tr>
                <td><?= $this->Number->format($formationsEmployee->id) ?></td>
                <td><?= $formationsEmployee->has('employee') ? $this->Html->link($formationsEmployee->employee->FullName, ['controller' => 'Employees', 'action' => 'view', $formationsEmployee->employee->id]) : '' ?></td>
                <td><?= $formationsEmployee->has('formation') ? $this->Html->link($formationsEmployee->formation->name, ['controller' => 'Formations', 'action' => 'view', $formationsEmployee->formation->id]) : '' ?></td>
                <td><?= h($formationsEmployee->date_executee) ?></td>
                <td><?= $formationsEmployee->has('proof') ? $this->Html->link($formationsEmployee->proof->id, ['controller' => 'Proofs', 'action' => 'view', $formationsEmployee->proof->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formationsEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formationsEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formationsEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsEmployee->id)]) ?>
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
