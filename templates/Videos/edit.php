<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 * @var string[]|\Cake\Collection\CollectionInterface $manuals
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $video->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $video->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Videos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="videos form content">
            <?= $this->Form->create($video) ?>
            <fieldset>
                <legend><?= __('Edit Video') ?></legend>
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
