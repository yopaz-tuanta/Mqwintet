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
            <?= $this->Html->link(__('Edit Manual'), ['action' => 'edit', $manual->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Manual'), ['action' => 'delete', $manual->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manual->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Manuals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Manual'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="manuals view content">
            <h3><?= h($manual->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($manual->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($manual->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($manual->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($manual->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($manual->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Videos') ?></h4>
                <?php if (!empty($manual->videos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Manual Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Thumbnail Url') ?></th>
                            <th><?= __('Video Url') ?></th>
                            <th><?= __('Sort Order') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($manual->videos as $video) : ?>
                        <tr>
                            <td><?= h($video->id) ?></td>
                            <td><?= h($video->manual_id) ?></td>
                            <td><?= $this->Html->link($video->title, ['controller' => 'Videos', 'action' => 'view', $video->id]) ?></td>
                            <td><?= h($video->description) ?></td>
                            <td><?= h($video->thumbnail_url) ?></td>
                            <td><?= h($video->video_url) ?></td>
                            <td><?= h($video->sort_order) ?></td>
                            <td><?= h($video->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Videos', 'action' => 'view', $video->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Videos', 'action' => 'edit', $video->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Videos', 'action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>