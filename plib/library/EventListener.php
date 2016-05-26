<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_CustomAction_EventListener implements EventListener
{
    public function handleEvent($objectType, $objectId, $action, $oldValue, $newValue)
    {
        if ($action == 'ext_custom-action_test_invoice_created') {
            $filePath = pm_ProductInfo::getPlatform() == pm_ProductInfo::PLATFORM_WINDOWS ?
            'C:\\Program Files (x86)\\Plesk\\tmp\\' : '/usr/local/psa/tmp/';
            $data = [
                $objectId,
                $objectType,
                $oldValue,
                $newValue,
            ];
            file_put_contents($filePath . 'ext-custom-action.log', json_encode($data));
        }
    }
}
return new Modules_CustomAction_EventListener();
