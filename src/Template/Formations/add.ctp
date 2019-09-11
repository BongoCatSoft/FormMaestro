<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('frequence');
            echo $this->Form->control('priority');
            echo $this->Form->control('type');
            echo $this->Form->control('category');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
