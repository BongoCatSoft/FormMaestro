<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="languages view large-9 medium-8 columns content">
    <h3><?= h($language->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Langue') ?></th>
            <td><?= h($language->langue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($language->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($language->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Number') ?></th>
                <th scope="col"><?= __('Civilite Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Cellphone') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Extra Infos') ?></th>
                <th scope="col"><?= __('Formation Plan Last Sent') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($language->employees as $employees): ?>
            <tr>
                <td><?= h($employees->id) ?></td>
                <td><?= h($employees->employee_number) ?></td>
                <td><?= h($employees->civilite_id) ?></td>
                <td><?= h($employees->name) ?></td>
                <td><?= h($employees->last_name) ?></td>
                <td><?= h($employees->language_id) ?></td>
                <td><?= h($employees->cellphone) ?></td>
                <td><?= h($employees->user_id) ?></td>
                <td><?= h($employees->email) ?></td>
                <td><?= h($employees->position_id) ?></td>
                <td><?= h($employees->location_id) ?></td>
                <td><?= h($employees->extra_infos) ?></td>
                <td><?= h($employees->formation_plan_last_sent) ?></td>
                <td><?= h($employees->active) ?></td>
                <td><?= h($employees->created) ?></td>
                <td><?= h($employees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
