<?php

/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package     MetaModels
 * @subpackage	metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

/**
 * Table setting for tl_metamodel_filtersetting
 *
 * @package     MetaModels
 * @subpackage	metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 */
class TableMetaModelFilterSetting_Hook extends Backend
{
	/**
	 * Options for hook function selection
	 *
	 * @param object
	 * @return array
	 */
	public function getHookFunctions($objDC)
	{
		if(count($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter']) < 1)
		{
			return array();
		}
		
		foreach($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'] as $strHook => $arrHook)
		{
			$arrReturn[] = $strHook;
		}
		
		return $arrReturn;
	}
}