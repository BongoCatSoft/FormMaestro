<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation[]|\Cake\Collection\CollectionInterface $formations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequence') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= $this->Number->format($formation->id) ?></td>
                <td><?= h($formation->name) ?></td>
                <td><?= $this->Number->format($formation->frequence) ?></td>
                <td><?= h($formation->priority) ?></td>
                <td><?= h($formation->type) ?></td>
                <td><?= h($formation->category) ?></td>
                <td><?= h($formation->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?>
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
