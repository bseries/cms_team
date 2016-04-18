<?php
/**
 * CMS Team
 *
 * Copyright (c) 2016 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see http://atelierdisko.de/licenses.
 */

namespace cms_team\models;

use lithium\g11n\Message;

class TeamMembers extends \base_core\models\Base {

	public $belongsTo = [
		'Owner' => [
			'to' => 'base_core\models\Users',
			'key' => 'owner_id'
		],
		'CoverMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'cover_media_id'
		]
	];

	protected $_actsAs = [
		'base_core\extensions\data\behavior\Ownable',
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'portrait' => [
					'type' => 'direct',
					'to' => 'portrait_media_id'
				]
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		],
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'Owner.name',
				'title',
				'category',
				'modified'
			]
		]
	];

	public static function init() {
		extract(Message::aliases());
		$model = static::_object();

		$model->validates['portrait_media_id'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('You must select on medium.', ['scope' => 'cms_team'])
			]
		];
		$model->validates['region'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('Need a region.', ['scope' => 'cms_team'])
			]
		];

		if (PROJECT_LOCALE !== PROJECT_LOCALES) {
			static::bindBehavior('li3_translate\extensions\data\behavior\Translatable', [
				'fields' => ['title', 'body'],
				'locale' => PROJECT_LOCALE,
				'locales' => explode(' ', PROJECT_LOCALES),
				'strategy' => 'inline'
			]);
		}
	}
}

Team::init();
?>
