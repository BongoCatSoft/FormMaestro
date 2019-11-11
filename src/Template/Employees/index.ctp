<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des preuves'), ['controller' => 'proofs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des formations faites'), ['controller' => 'formations_employee', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('employee_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civilite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <!--<th scope="col"><?//= $this->Paginator->sort('cellphone') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('user_id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_plan_last_sent') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('active') ?></th>!-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= h($employee->employee_number) ?></td>
                <td><?= $employee->has('civilitee') ? $this->Html->link($employee->civilitee->civilite, ['controller' => 'Civilitees', 'action' => 'view', $employee->civilitee->id]) : '' ?></td>
                <td><?= h($employee->name) ?></td>
                <td><?= h($employee->last_name) ?></td>
                <td><?= $employee->has('language') ? $this->Html->link($employee->language->langue, ['controller' => 'Languages', 'action' => 'view', $employee->language->id]) : '' ?></td>
                <!-- <td><?//= h($employee->cellphone) ?></td>
                <td><?//= $this->Number->format($employee->user_id) ?></td>-->
                <td><?= h($employee->email) ?></td>
                <td><?= $employee->has('position') ? $this->Html->link($employee->position->name, ['controller' => 'Positions', 'action' => 'view', $employee->position->id]) : '' ?></td>
                <td><?= $employee->has('location') ? $this->Html->link($employee->location->address, ['controller' => 'Locations', 'action' => 'view', $employee->location->id]) : '' ?></td>
                <td><?= h($employee->formation_plan_last_sent) ?></td>
               <!-- <td><?= h($employee->active) ?></td> !-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                    <?= $this->Html->link(__('Plan de formation'), [/*'controller' => 'PlansFormation',*/'action' => 'plan', $employee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
