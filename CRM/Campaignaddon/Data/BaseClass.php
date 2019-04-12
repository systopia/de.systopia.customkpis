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

abstract class CRM_Campaignaddon_Data_BaseClass {

  public const PROVIDER_NOT_SET = 'NoProviderSet';

  protected $providerNames = [self::PROVIDER_NOT_SET];

  protected $campaignId;
  protected $campaignChildren;
  protected $allCampaignIds;

  protected $trashLookup = [
    'join' => '',
    'where' => '',
    'where_and' => ''
  ];

  abstract public function getData();

  protected function getProviderResults($query) {
    $queryResult = CRM_Core_DAO::executeQuery($query);
    if ($queryResult->fetch()) {
      $result = [];
      foreach ($this->providerNames as $providerName) {
        $result[$providerName] = $queryResult->$providerName;
      }
    }
    else {
      foreach ($this->providerNames as $providerName) {
        $result[$providerName] = 'ErrorQueryResultWasEmpty';
      }
    }

    return $result;
  }

  /**
   * Create the strings for trash lookup (deleted contacts) regarding the configuration.
   */
  protected function createTrashLookup($contact_id_variable_name) {
    $settings = CRM_Campaignaddon_Configuration::getSettings();

    if ($settings['include_deleted_contacts']) {
      $where_core = ' (trash_lookup.is_deleted = 0 OR trash_lookup.is_deleted IS NULL) ';
      $this->trashLookup = [
        'join' => " LEFT JOIN civicrm_contact AS trash_lookup ON {$contact_id_variable_name} = trash_lookup.id ",
        'where' => ' WHERE' . $where_core,
        'where_and' => ' AND ' . $where_core
      ];
    }
  }

  public function getProviderNames() {
    return $this->providerNames;
  }

  public function setCampaign($campaignId, $campaignChildren) {
    $this->campaignId = $campaignId;
    $this->campaignChildren = $campaignChildren;

    //Format of campaignChildren: "id":"name"
    $this->allCampaignIds = array_keys($campaignChildren);
    $this->allCampaignIds[] = $campaignId;
  }

}