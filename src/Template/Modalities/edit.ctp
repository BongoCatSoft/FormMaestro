<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modality $modality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $modality->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $modality->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Modalities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modalities form large-9 medium-8 columns content">
    <?= $this->Form->create($modality) ?>
    <fieldset>
        <legend><?= __('Edit Modality') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
