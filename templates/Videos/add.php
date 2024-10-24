<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 * @var \Cake\Collection\CollectionInterface|string[] $manuals
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Videos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="videos form content">
            <?= $this->Form->create($video) ?>
            <fieldset>
                <legend><?= __('Add Video') ?></legend>
                <?php
                    echo $this->Form->control('manual_id', ['options' => $manuals]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('desc');
                    echo $this->Form->control('thumbnail_url');
                    echo $this->Form->control('video_url');
                    echo $this->Form->control('sort_order');
                    echo $this->Form->control('released');
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
