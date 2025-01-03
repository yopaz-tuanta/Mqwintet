<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Manual> $manuals
 */
?>
<div class="manuals index content">
    <?= $this->Html->link(__('New Manual'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Manuals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('videos') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manuals as $manual): ?>
                <tr>
                    <td><?= $this->Number->format($manual->id) ?></td>
                    <td><?= h($manual->title) ?></td>
                    <td><?= h($manual->description) ?></td>
                    <td><?= h(sizeof($manual->videos)) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $manual->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manual->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manual->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manual->id)]) ?>
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