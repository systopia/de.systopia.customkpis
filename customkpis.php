<?php

require_once 'customkpis.civix.php';
use CRM_Customkpis_ExtensionUtil as E;


/**
 * Implements additional custom KPIs for the Campaign extension.
 * @param $campaignId
 * @param $kpiList
 * @param $level
 */
function customkpis_civicrm_campaignKpis($campaignId, &$kpiList, $level) {
  CRM_Customkpis_Customkpis::getSingleton()->startKpis($campaignId, $kpiList, $level);
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function customkpis_civicrm_config(&$config) {
  _customkpis_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function customkpis_civicrm_install() {
  _customkpis_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function customkpis_civicrm_enable() {
  _customkpis_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *

 // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function customkpis_civicrm_navigationMenu(&$menu) {
  _customkpis_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _customkpis_civix_navigationMenu($menu);
} // */
