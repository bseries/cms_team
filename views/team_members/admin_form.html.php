<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_team', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->name,
		'empty' => $t('untitled'),
		'object' => $t('Team Member')
	],
	'meta' => [
		'is_published' => $item->is_published ? $t('published') : $t('unpublished')
	]
]);

?>
<article>
	<?=$this->form->create($item) ?>
		<?php if ($useOwner): ?>
			<div class="grid-row">
				<h1><?= $t('Access') ?></h1>

				<div class="grid-column-left"></div>
				<div class="grid-column-right">
					<?= $this->form->field('owner_id', [
						'type' => 'select',
						'label' => $t('Owner'),
						'list' => $users
					]) ?>
				</div>
			</div>
		<?php endif ?>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('name', [
					'type' => 'text',
					'label' => $t('Name'),
				]) ?>
				<?= $this->form->field('position', [
					'type' => 'text',
					'label' => $t('Position')
				]) ?>
				<?= $this->form->field('phone', [
					'type' => 'text',
					'label' => $t('Phone')
				]) ?>
				<?= $this->form->field('email', [
					'type' => 'text',
					'label' => $t('Email')
				]) ?>
				<?= $this->form->field('fax', [
					'type' => 'text',
					'label' => $t('Fax')
				]) ?>
			</div>
			<div class="grid-column-right"></div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->media->field('portrait_media_id', [
					'label' => $t('Portrait'),
					'attachment' => 'direct',
					'value' => $item->portrait()
				]) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->media->field('media', [
					'label' => $t('Media'),
					'attachment' => 'joined',
					'value' => $item->media()
				]) ?>
			</div>
		</div>
		<div class="grid-row">
			<?php if ($isTranslated): ?>
				<?php foreach ($item->translate('vita') as $locale => $value): ?>
					<?= $this->editor->field("i18n.vita.{$locale}", [
						'label' => $t('Vita') . ' (' . $this->g11n->name($locale) . ')',
						'size' => 'beta',
						'features' => 'full',
						'value' => $value
					]) ?>
				<?php endforeach ?>
			<?php else: ?>
				<?= $this->editor->field('vita', [
					'label' => $t('Vita'),
					'size' => 'beta',
					'features' => 'minimal'
				]) ?>
			<?php endif ?>
		</div>

		<div class="bottom-actions">
			<div class="bottom-actions__left">
				<?php if ($item->exists()): ?>
					<?= $this->html->link($t('delete'), [
						'action' => 'delete', 'id' => $item->id
					], ['class' => 'button large delete']) ?>
				<?php endif ?>
			</div>
			<div class="bottom-actions__right">
				<?php if ($item->exists()): ?>
					<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish'], ['class' => 'button large']) ?>
				<?php endif ?>
				<?= $this->form->button($t('save'), [
					'type' => 'submit',
					'class' => 'button large save'
				]) ?>
			</div>
		</div>

	<?=$this->form->end() ?>
</article>