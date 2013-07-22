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
 * Filter rule for MetaModel from external hook functions
 *
 * @package     MetaModels
 * @subpackage  metamodelsfilter_hook
 * @author      Tim Gatzky <info@tim-gatzky.de>
 */
class MetaModelFilterRuleHook extends MetaModelFilterRule
{
	/**
	 * name or index of HOOK
	 *
	 * @var string
	 */
	protected $strHook = '';
	
	/**
	 * filter setting
	 *
	 * @var object
	 */
	protected $objFilterSetting = null;
	
	/**
	 * creates an instance of a filter rule.
	 *
	 * @param string $strHook	 the name of the registered hook
	 * @param array  MetaModelFilterSetting    $objFilterSetting	the corressponding filter setting object
	 */
	public function __construct($strHook,$objFilterSetting=null)
	{
		$this->strHook = $strHook;
		$this->objFilterSetting = $objFilterSetting;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getMatchingIds()
	{
		$arrIds = array();
		
		// run HOOK
		// expects an array of metamodel item ids as return value
		if(isset($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->strHook]) && count($GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->strHook]) > 0)
		{
			$strClass = $GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->strHook][0];
			$strFunction = $GLOBALS['METAMODEL_HOOKS']['metamodelsfilter'][$this->strHook][1];
			$objCallback = new $strClass;
			$arrIds = $objCallback->$strFunction($this->objFilterSetting,$this);
		}

		if(count($arrIds) < 1)
		{
			return;
		}

		return $arrIds;
	}
}