<?php
/**
 * @package		mod_jieeebanners
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
                Portions copyright (c) 2012 Thibaut Cuvelier
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 
 * This module is based on J! 2.5's mod_banners, with a bit of JavaScript and according
 * modifications in the view. 
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$headerText	= trim($params->get('header_text'));
$footerText	= trim($params->get('footer_text'));

require_once JPATH_ROOT . '/administrator/components/com_banners/helpers/banners.php';
BannersHelper::updateReset();
$list = &modBannersHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_jieeebanners', $params->get('layout', 'default'));
