<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Reset Password</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Send')); ?>
    <?= $this->Form->end() ?>
</div>