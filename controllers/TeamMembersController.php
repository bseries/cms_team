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

namespace cms_team\controllers;

use lithium\util\Set;
use cms_team\models\TeamMembers;

class TeamMembersController extends \base_core\controllers\BaseController {

	use \base_core\controllers\AdminIndexOrderedTrait; // was war das nochmal? sortierbar machen?

	use \base_core\controllers\AdminAddTrait; // Im cms die Möglichkeit in Form eines Buttons einen Beitrag dieses Moduls hinzuzufügen 
	use \base_core\controllers\AdminEditTrait; // im cms button um einen beitrag zu editieren
	use \base_core\controllers\AdminDeleteTrait; // im cms button um einen beitrag zu löschen

	use \base_core\controllers\AdminOrderTrait; // im cms die Möglichkeit beitrage per drag and drop zu verschieben
	use \base_core\controllers\AdminPublishTrait; // im cms die Möglichkeit auf einen Publish button zu drücken > benötigt Datenbank feld 'published'
}

?>
