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
        <li><?= $this->Html->link(__('New Employees'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des preuves'), ['controller' => 'proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des formations faites'), ['controller' => 'formations_employee', 'action' => 'index']) ?></li>


    </ul>
</nav>
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>!-->
                <th scope="col"><?= $this->Paginator->sort('Nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reminder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modality_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarque') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <!--<td><?= $this->Number->format($formation->id) ?></td>!-->
                <td><?= h($formation->titre) ?></td>
                <td><?= h($formation->categorie) ?></td>
                <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->title, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
                <td><?= $formation->has('reminder') ? $this->Html->link($formation->reminder->title, ['controller' => 'Reminders', 'action' => 'view', $formation->reminder->id]) : '' ?></td>
                <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->title, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
                <td><?= $this->Number->format($formation->duree) ?></td>
                <td><?= h($formation->remarque) ?></td>
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
