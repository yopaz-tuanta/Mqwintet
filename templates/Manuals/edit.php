<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manual $manual
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $manual->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $manual->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Manuals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="manuals form content">
            <?= $this->Form->create($manual) ?>
            <fieldset>
                <legend><?= __('Edit Manual') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>