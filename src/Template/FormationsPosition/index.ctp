<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPosition[]|\Cake\Collection\CollectionInterface $formationsPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formations Position'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPosition index large-9 medium-8 columns content">
    <h3><?= __('Formations Position') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proof_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_formation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formationsPosition as $formationsPosition): ?>
            <tr>
                <td><?= $this->Number->format($formationsPosition->id) ?></td>
                <td><?= $formationsPosition->has('position') ? $this->Html->link($formationsPosition->position->name, ['controller' => 'Positions', 'action' => 'view', $formationsPosition->position->id]) : '' ?></td>
                <td><?= $formationsPosition->has('formation') ? $this->Html->link($formationsPosition->formation->name, ['controller' => 'Formations', 'action' => 'view', $formationsPosition->formation->id]) : '' ?></td>
                <td><?= $formationsPosition->has('proof') ? $this->Html->link($formationsPosition->proof->id, ['controller' => 'Proofs', 'action' => 'view', $formationsPosition->proof->id]) : '' ?></td>
                <td><?= h($formationsPosition->status_formation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formationsPosition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formationsPosition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formationsPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPosition->id)]) ?>
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
