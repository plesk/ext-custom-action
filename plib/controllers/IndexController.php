<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class IndexController extends pm_Controller_Action
{
    public function indexAction()
    {
        $this->view->pageTitle = 'Create Invoice';
        $this->view->actionLogText = 'Action "Test Action: Invoice created" is already added to ' .
            '<a href="/plesk/actionlog/">Action Log</a>.<br>';
        $this->view->eventHandlerText = 'Create <a href=\"/admin/event-handlers/list\">Event Handler</a>' .
            ' for "Test Action: Invoice created",<br> fill necessary info and click OK button.';
        $form = new Modules_CustomAction_Form_Invoice();

        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            $newInvoiceId = $this->getRequest()->isPost();
            $oldVariablesData = null;
            $newVariablesData = [
                'bill_to' => $form->getValue('billTo'),
                'total' => $form->getValue('total'),
            ];
            pm_ActionLog::submit('test_invoice_created', $newInvoiceId, $oldVariablesData, $newVariablesData);
            $this->_status->addMessage('info', 'Invoice for ' . $form->getValue('billTo') . ' successfully created');
            $this->_helper->json(['redirect' => pm_Context::getModulesListUrl()]);
        }
        $this->view->form = $form;
    }

}
