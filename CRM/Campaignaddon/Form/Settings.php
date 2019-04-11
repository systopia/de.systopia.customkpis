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

use CRM_Campaignaddon_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Campaignaddon_Form_Settings extends CRM_Core_Form {

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

    //Config for including contacts in trash:
    $this->add(
      'checkbox',
      'include_trash_contacts',
      E::ts('Include contacts in trash'),
      NULL,
      TRUE
    );

    $settings = CRM_Campaignaddon_Configuration::getSettings();
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
    $values = $this->exportValues();
    CRM_Campaignaddon_Configuration::setSettings($values);
    parent::postProcess();
  }

}
