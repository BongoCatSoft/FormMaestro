<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($formation->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= h($formation->categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequence') ?></th>
            <td><?= h($formation->frequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debut Rappel') ?></th>
            <td><?= h($formation->debut_rappel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modalite') ?></th>
            <td><?= h($formation->modalite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarque') ?></th>
            <td><?= h($formation->remarque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duree') ?></th>
            <td><?= $this->Number->format($formation->duree) ?></td>
        </tr>
    </table>
</div>
