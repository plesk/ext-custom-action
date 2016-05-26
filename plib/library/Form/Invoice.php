<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_CustomAction_Form_Invoice extends pm_Form_Simple
{
    public function init()
    {
        $this->addElement('text', 'billTo', [
            'label' => 'Bill To',
            'value' => pm_Settings::get('billTo'),
            'required' => true,
            'validators' => [
                ['NotEmpty', true],
            ],
        ]);

        $this->addElement('text', 'total', [
            'label' => 'Total $',
            'value' => pm_Settings::get('total'),
            'required' => true,
            'validators' => [
                ['Digits', true],
            ],
        ]);

        $this->addControlButtons([
            'cancelLink' => pm_Context::getModulesListUrl(),
        ]);
    }
}
