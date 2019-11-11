<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('employee_number');
            echo $this->Form->control('civilite_id', ['options' => $civilitees]);
            echo $this->Form->control('name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('language_id', ['options' => $languages]);
            /*echo $this->Form->control('cellphone');
            echo $this->Form->control('user_id');*/
            echo $this->Form->control('email');
            echo $this->Form->control('position_id', ['options' => $positions]);
            echo $this->Form->control('location_id', ['options' => $locations]);
            //echo $this->Form->control('formation_plan_last_sent', ['empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
