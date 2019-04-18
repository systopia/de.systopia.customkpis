{*-------------------------------------------------------+
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
+-------------------------------------------------------*}


<div class="crm-section">
  <div class="label">{$form.versand_activity_types.label}</div>
  <div class="content">{$form.versand_activity_types.html}</div>
  <div class="clear"></div>
</div>

<div class="crm-section">
  <div class="label">{$form.include_deleted_contacts.label}</div>
  <div class="content">{$form.include_deleted_contacts.html}</div>
  <div class="clear"></div>
</div>


{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
