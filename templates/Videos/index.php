<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Video> $videos
 */
?>
<div class="videos index content">
    <?= $this->Html->link(__('New Video'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Videos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('manual_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('sort_order') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('released') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($videos as $video): ?>
                <tr>
                    <td><?= $this->Number->format($video->id) ?></td>
                    <td><?= $video->hasValue('manual') ? $this->Html->link($video->manual->title, ['controller' => 'Manuals', 'action' => 'view', $video->manual->id]) : '' ?></td>
                    <td><?= h($video->title) ?></td>
                    <td><?= $this->Number->format($video->sort_order) ?></td>
                    <td><?= h($video->created) ?></td>
                    <td><?= h($video->modified) ?></td>
                    <td><?= h($video->released) ?></td>
                    <td><?= h($video->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $video->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $video->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>