<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proof[]|\Cake\Collection\CollectionInterface $proofs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Proof'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations Employee'), ['controller' => 'FormationsEmployee', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Employee'), ['controller' => 'FormationsEmployee', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations Position'), ['controller' => 'FormationsPosition', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Position'), ['controller' => 'FormationsPosition', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="proofs index large-9 medium-8 columns content">
    <h3><?= __('Proofs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('original_file_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proofs as $proof): ?>
            <tr>
                <td><?= $this->Number->format($proof->id) ?></td>
                <td><?= h($proof->original_file_name) ?></td>
                <td><?= h($proof->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $proof->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proof->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proof->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proof->id)]) ?>
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
