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
 * @subpackage 	metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 */
class MetaModelFilterSettingHook extends MetaModelFilterSetting
{
	/* (non-PHPdoc)
	 * @see IMetaModelFilterSetting::prepareRules()
	 */
	public function prepareRules(IMetaModelFilter $objFilter, $arrFilterUrl)
	{
		$arrIds = array();
		
		// run HOOK
		// expects an array of metamodel item ids as return value
		if(isset($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->get('hook')]) && count($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->get('hook')]) > 0)
		{
			$strClass = $GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->get('hook')][0];
			$strFunction = $GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->get('hook')][1];
			
			$objCallback = new $strClass;
			$arrIds = $objCallback->$strFunction($objFilter,$this);
		}
		
		if(count($arrIds) < 1)
		{
			return;
		}

		// set filter
		$objFilter->addFilterRule(new MetaModelFilterRuleStaticIdList($arrIds));
	}
}