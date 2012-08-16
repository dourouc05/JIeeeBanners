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

jimport('joomla.application.component.model');

class modBannersHelper
{
	static function &getList(&$params)
	{
		jimport('joomla.application.component.model');
		JModel::addIncludePath(JPATH_ROOT.'/components/com_banners/models', 'BannersModel');
		$document	= JFactory::getDocument();
		$app		= JFactory::getApplication();
		$keywords	= explode(',', $document->getMetaData('keywords'));

		$model = JModel::getInstance('Banners', 'BannersModel', array('ignore_request'=>true));
		$model->setState('filter.client_id', (int) $params->get('cid'));
		$model->setState('filter.category_id', $params->get('catid', array()));
		$model->setState('list.limit', (int) $params->get('count', 1));
		$model->setState('list.start', 0);
		$model->setState('filter.ordering', $params->get('ordering'));
		$model->setState('filter.tag_search', $params->get('tag_search'));
		$model->setState('filter.keywords', $keywords);
		$model->setState('filter.language', $app->getLanguageFilter());

		$banners = $model->getItems();
		$model->impress();

		return $banners;
	}
}