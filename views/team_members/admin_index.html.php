<?php

use lithium\g11n\Message;
use base_core\extensions\cms\Settings;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_team', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'multiple',
		'object' => $t('Team Members')
	]
]);

?>
<article
	class="use-rich-index"
	data-endpoint="<?= $this->url([
		'action' => 'index',
		'page' => '__PAGE__',
		'orderField' => '__ORDER_FIELD__',
		'orderDirection' => '__ORDER_DIRECTION__',
		'filter' => '__FILTER__'
	]) ?>"
>

	<div class="top-actions">
		<?= $this->html->link($t('team member'), ['action' => 'add'], ['class' => 'button add']) ?>
	</div>

	<?php if ($data->count()): ?>
		<table>
			<thead>
				<tr>
					<td data-sort="is-published" class="flag is-published table-sort"><?= $t('publ.?') ?>
					<?php if (Settings::read('team.usePromotion')): ?>
						<td data-sort="is-promoted" class="flag is-promoted table-sort"><?= $t('prom.?') ?>
					<?php endif ?>
					<td class="media">
					<td data-sort="name" class="emphasize title table-sort"><?= $t('Name') ?>
					<td data-sort="position" class="emphasize title table-sort"><?= $t('Position') ?>
					<td data-sort="modified" class="date modified table-sort desc"><?= $t('Modified') ?>
					<?php if ($useOwner): ?>
						<td data-sort="owner.name" class="user table-sort"><?= $t('Owner') ?>
					<?php endif ?>
					<?php if ($useSites): ?>
						<td data-sort="site" class="table-sort"><?= $t('Site') ?>
					<?php endif ?>
					<td class="actions">
						<?= $this->form->field('search', [
							'type' => 'search',
							'label' => false,
							'placeholder' => $t('Filter'),
							'class' => 'table-search',
							'value' => $this->_request->filter
						]) ?>
			</thead>
			<tbody class="use-manual-sorting">
				<?php foreach ($data as $item): ?>
				<tr>
					<td class="flag"><i class="material-icons"><?= ($item->is_published ? 'done' : '') ?></i>
					<?php if (Settings::read('team.usePromotion')): ?>
						<td class="flag"><i class="material-icons"><?= ($item->is_promoted ? 'done' : '') ?></i>
					<?php endif ?>

					<td class="media">
						<?php if ($portrait = $item->portrait()): ?>
							<?= $this->media->image($portrait->version('fix3admin'), [
								'data-media-id' => $portrait->id, 'alt' => 'preview'
							]) ?>
						<?php endif ?>
					<td class="emphasize title"><?= $item->name ?>
					<td class="emphasize title"><?= $item->position ?>
					<td class="date modified">
						<time datetime="<?= $this->date->format($item->modified, 'w3c') ?>">
							<?= $this->date->format($item->modified, 'date') ?>
						</time>
					<?php if ($useOwner): ?>
						<td class="user">
							<?= $item->owner()->name ?>
					<?php endif ?>
					<?php if ($useSites): ?>
						<td>
							<?= $item->site ?: '-' ?>
					<?php endif ?>
					<td class="actions">
						<?php if (Settings::read('team.usePromotion')): ?>
							<?= $this->html->link($item->is_promoted ? $t('unpromote') : $t('promote'), ['id' => $item->id, 'action' => $item->is_promoted ? 'unpromote': 'promote', 'library' => 'cms_team'], ['class' => 'button']) ?>
						<?php endif ?>
						<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_team'], ['class' => 'button']) ?>
						<?= $this->html->link($t('open'), ['id' => $item->id, 'action' => 'edit', 'library' => 'cms_team'], ['class' => 'button']) ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="none-available"><?= $t('No team members added, yet.') ?></div>
	<?php endif ?>

</article>
