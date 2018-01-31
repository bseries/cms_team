<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_team', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->name,
		'empty' => $t('unnamed'),
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
					'class' => 'use-for-title'
				]) ?>

				<?php if ($isTranslated): ?>
					<?php foreach ($item->translate('position') as $locale => $value): ?>
						<?= $this->form->field("i18n.position.{$locale}", [
							'label' => $t('Position') . ' (' . $this->g11n->name($locale) . ')',
							'type' => 'text',
							'value' => $value

						]) ?>
					<?php endforeach ?>
				<?php else: ?>
					<?= $this->form->field('position', [
						'label' => $t('Position'),
						'type' => 'text'
					]) ?>
				<?php endif ?>

			</div>
			<div class="grid-column-right">
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
				<?= $this->form->field('urls', [
					'type' => 'textarea',
					'label' => $t('Social Links'),
					'value' => $item->urls()
				]) ?>
				<div class="help">
					<?= $t('Specify Links as URLs with leading protocol (i.e. `http://example.com`).') ?>
					<?= $t('Separate multiple links with newlines so that each one has its own line.') ?>
				</div>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->media->field('cover_media_id', [
					'label' => $t('Cover'),
					'attachment' => 'direct',
					'value' => $item->cover()
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
					'features' => 'full'
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