<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proof $proof
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Proofs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations Employee'), ['controller' => 'FormationsEmployee', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Employee'), ['controller' => 'FormationsEmployee', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations Position'), ['controller' => 'FormationsPosition', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Position'), ['controller' => 'FormationsPosition', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="proofs form large-9 medium-8 columns content">
    <?= $this->Form->create($proof, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Proof') ?></legend>
        <?php
        echo $this->Form->control('original_file_name', ['type' => 'file', 'id'=>'file','onchange'=>"Filevalidation()"]);
        ?>
        <button id="Submit" >Submit</button>
    </fieldset>
    <!--<?= $this->Form->button(__('Submit')) ?>!-->
    <?= $this->Form->end() ?>

    <script>
        Filevalidation = () => {

            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {

                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    document.getElementById("Submit").hidden = false;
                    if (file >= 300) {
                        alert(
                            "fichier trop gros");
                        document.getElementById("Submit").hidden = true;

                    } else  {


                    }
                }
            }
        }
    </script>
</div>
