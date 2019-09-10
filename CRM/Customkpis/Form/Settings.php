<?php
/*-------------------------------------------------------+
| SYSTOPIA Campaign Manager Addon                        |
| Copyright (C) 2019 SYSTOPIA                            |
| Author: B. Zschiedrich (zschiedrich@systopia.de)       |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+-------------------------------------------------------*/

use CRM_Customkpis_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Customkpis_Form_Settings extends CRM_Core_Form {

  public function buildQuickForm() {

    //Get activity types:
    $activity_types = civicrm_api3('OptionValue', 'get', [
      'sequential' => 1,
      'return' => ['label', 'value'],
      'option_group_id' => 'activity_type',
      'options' => ['limit' => 0],
    ]);

    //Convert activity types to form format (value => label):
    $activity_type_array = $activity_types['values'];
    $activity_types = [];
    foreach($activity_type_array as &$type) {
      $activity_types[$type['value']] = E::ts($type['label']);
    }

    //Select for activity types:
    $this->add(
      'select',
      'versand_activity_types',
      E::ts('Versand activity types'),
      $activity_types,
      TRUE,
      array(
        'multiple' => TRUE,
        'class' => 'crm-select2 huge',
        'placeholder' => ts('- none -'),
      )
    );

    //Config for including deleted contacts:
    $this->add(
      'checkbox',
      'include_deleted_contacts',
      E::ts('Include deleted contacts'),
      NULL
    );

    $settings = CRM_Customkpis_Configuration::getSettings();
    // We only want the settings set as defaults that are identifiers:
    $settings = array_filter($settings, function($key)
      {
        return in_array($key, ['versand_activity_types', 'include_deleted_contacts']);
      },
      ARRAY_FILTER_USE_KEY
    );

    $this->setDefaults($settings);

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Save'),
        'isDefault' => TRUE,
      ),
    ));

    parent::buildQuickForm();
  }

  public function postProcess() {
    $values = $this->exportValues(array_keys(CRM_Customkpis_Configuration::getDefaultConfiguration()), false);

    $settings = CRM_Customkpis_Configuration::getSettings();
    foreach($values as $key => $value)
    {
      $settings[$key] = $value;
    }

    CRM_Customkpis_Configuration::setSettings($settings);
    parent::postProcess();
  }

}
