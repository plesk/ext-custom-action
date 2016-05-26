<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_CustomAction_ActionLog extends pm_Hook_ActionLog
{
    public function getEvents()
    {
        return [
            'test_invoice_created' => 'Test Action: Invoice created',
        ];
    }
}
