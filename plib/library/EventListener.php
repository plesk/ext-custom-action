<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_CustomAction_EventListener implements EventListener
{
    public function handleEvent($objectType, $objectId, $action, $oldValue, $newValue)
    {
        if ($action == 'ext_custom-action_test_invoice_created') {
            $filePath = $this->getPleskTempPath() . DIRECTORY_SEPARATOR . 'ext-custom-action.log';
            $data = [
                $objectId,
                $objectType,
                $oldValue,
                $newValue,
            ];
            file_put_contents($filePath, json_encode($data));
        }
        pm_Log::info("Event '{$action}' is successfully handled.");
    }

    private function getPleskTempPath()
    {
        if (method_exists('pm_ProductInfo', 'getPrivateTempDir')) {
            return pm_ProductInfo::getPrivateTempDir();
        }

        return pm_ProductInfo::getPlatform() == pm_ProductInfo::PLATFORM_WINDOWS ?
            'C:\\Program Files (x86)\\Plesk\\PrivateTemp' : '/usr/local/psa/tmp';
    }

}

return new Modules_CustomAction_EventListener();
