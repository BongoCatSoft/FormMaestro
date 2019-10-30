<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequence $frequence
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Frequence'), ['action' => 'edit', $frequence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Frequence'), ['action' => 'delete', $frequence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Frequences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequence'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="frequences view large-9 medium-8 columns content">
    <h3><?= h($frequence->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($frequence->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($frequence->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($frequence->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Categorie') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Reminder Id') ?></th>
                <th scope="col"><?= __('Modality Id') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarque') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($frequence->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->titre) ?></td>
                <td><?= h($formations->categorie) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->reminder_id) ?></td>
                <td><?= h($formations->modality_id) ?></td>
                <td><?= h($formations->duree) ?></td>
                <td><?= h($formations->remarque) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
