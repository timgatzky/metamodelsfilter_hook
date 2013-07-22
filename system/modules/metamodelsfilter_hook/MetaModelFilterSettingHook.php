<?php

/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package     MetaModels
 * @subpackage metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

/**
 * Filter setting for MetaModel from external hook functions
 *
 * @package     MetaModels
 * @subpackage  metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 */
class MetaModelFilterSettingHook extends MetaModelFilterSetting
{
	/* (non-PHPdoc)
	 * @see IMetaModelFilterSetting::prepareRules()
	 */
	public function prepareRules(IMetaModelFilter $objFilter, $arrFilterUrl)
	{
		// set filter
		$objFilter->addFilterRule(new MetaModelFilterRuleHook($this->get('hook'),$this));
	}
}
