<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPosition $formationsPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations Position'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proofs'), ['controller' => 'Proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proof'), ['controller' => 'Proofs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPosition form large-9 medium-8 columns content">
    <?= $this->Form->create($formationsPosition) ?>
    <fieldset>
        <legend><?= __('Add Formations Position') ?></legend>
        <?php
            echo $this->Form->control('position_id', ['options' => $positions]);
            echo $this->Form->control('formation_id', ['options' => $formations]);
            echo $this->Form->control('proof_id', ['options' => $proofs, 'empty' => true]);
            echo $this->Form->control('status_formation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
