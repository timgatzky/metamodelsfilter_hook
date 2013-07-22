<?php

/**
 * Example class for metamodels filter hook
 */
 
class MetaModelsFilterHookExample extends Backend
{
	/**
	 * Initialize object
	 */
	public function __construct(){}
	
	/**
	 * Example hook function
	 * 
	 * @param
	 * @return array	List of item ids
	 */
	public function myFilterFunction($objFilterSetting)
	{
		// get metamodel
		$objMetaModel = $objFilterSetting->objFilterSetting->getMetaModel();
		
		$arrIds = array();
		
		return $arrIds;
	}
}