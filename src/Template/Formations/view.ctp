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
            <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->title, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reminder') ?></th>
            <td><?= $formation->has('reminder') ? $this->Html->link($formation->reminder->title, ['controller' => 'Reminders', 'action' => 'view', $formation->reminder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modality') ?></th>
            <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->title, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
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
    <div class="related">
        <h4><?= __('Related Formations Employee') ?></h4>
        <?php if (!empty($formation->formations_employee)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Date Executee') ?></th>
                <th scope="col"><?= __('Proof Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->formations_employee as $formationsEmployee): ?>
            <tr>
                <td><?= h($formationsEmployee->id) ?></td>
                <td><?= h($formationsEmployee->employee_id) ?></td>
                <td><?= h($formationsEmployee->formation_id) ?></td>
                <td><?= h($formationsEmployee->date_executee) ?></td>
                <td><?= h($formationsEmployee->proof_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FormationsEmployee', 'action' => 'view', $formationsEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormationsEmployee', 'action' => 'edit', $formationsEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormationsEmployee', 'action' => 'delete', $formationsEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsEmployee->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Formations Position') ?></h4>
        <?php if (!empty($formation->formations_position)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Proof Id') ?></th>
                <th scope="col"><?= __('Status Formation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->formations_position as $formationsPosition): ?>
            <tr>
                <td><?= h($formationsPosition->id) ?></td>
                <td><?= h($formationsPosition->position_id) ?></td>
                <td><?= h($formationsPosition->formation_id) ?></td>
                <td><?= h($formationsPosition->proof_id) ?></td>
                <td><?= h($formationsPosition->status_formation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FormationsPosition', 'action' => 'view', $formationsPosition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormationsPosition', 'action' => 'edit', $formationsPosition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormationsPosition', 'action' => 'delete', $formationsPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPosition->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
