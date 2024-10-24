<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Video'), ['action' => 'edit', $video->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Video'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Videos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Video'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="videos view content">
            <h3><?= h($video->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Manual') ?></th>
                    <td><?= $video->hasValue('manual') ? $this->Html->link($video->manual->title, ['controller' => 'Manuals', 'action' => 'view', $video->manual->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($video->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($video->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort Order') ?></th>
                    <td><?= $this->Number->format($video->sort_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($video->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($video->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Released') ?></th>
                    <td><?= h($video->released) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($video->deleted) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($video->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Thumbnail Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($video->thumbnail_url)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Video Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($video->video_url)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>