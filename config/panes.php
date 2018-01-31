<?php
/**
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_team\config;

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('cms.teamMembers', [
	'title' => $t('Team Members', ['scope' => 'cms_team']),
	'url' => ['controller' => 'teamMembers', 'action' => 'index', 'library' => 'cms_team', 'admin' => true],
	'weight' => 70
]);

Panes::register('cms.vacantTeamPositions', [
	'title' => $t('Vacant Team Positions', ['scope' => 'cms_team']),
	'url' => ['controller' => 'vacantTeamPositions', 'action' => 'index', 'library' => 'cms_team', 'admin' => true],
	'weight' => 71
]);

?>