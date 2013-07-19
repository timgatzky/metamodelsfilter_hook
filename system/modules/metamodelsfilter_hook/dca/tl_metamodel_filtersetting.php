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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_metamodel_filtersetting']['metapalettes']['hook extends default'] = array
(
	'+config' => array('hook'),
);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_metamodel_filtersetting']['fields']['hook'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_metamodel_filtersetting']['hook'],
	'exclude'                 => true,
	'default'                 => true,
	'inputType'               => 'select',
	'reference'				  => &$GLOBALS['TL_LANG']['MSC']['metamodelsfilter'],
	'options_callback'		  => array('TableMetaModelFilterSetting_Hook','getHookFunctions'),
	'eval'                    => array
	(
		'tl_class'            => 'w50',
		'includeBlankOption'  => true,
	),
);
