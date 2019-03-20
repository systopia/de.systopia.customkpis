<?php
/*-------------------------------------------------------+
| SYSTOPIA OnlyOffice Integration                        |
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

  protected $name = 'BaseClass';

  protected $campaignId;
  protected $campaignChildren;
  protected $allCampaignIds;

  abstract public function getData();

  public function getName() {
    return $this->name;
  }

  public function setCampaign($campaignId, $campaignChildren) {
    $this->campaignId = $campaignId;
    $this->campaignChildren = $campaignChildren;

    $this->allCampaignIds = array_keys($campaignChildren);
    $this->allCampaignIds[] = $campaignId;
  }

}