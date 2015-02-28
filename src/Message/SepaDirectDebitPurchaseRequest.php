<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments SEPA Direct debit Purchase Request
 */
class SepaDirectDebitPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'directdebit';
        $data['recurring'] = 0; //(int) $this->getRecurring();

        return $data;
    }

    public function setRecurring($value)
    {
        return $this->setParameter('recurring', $value);
    }

    public function getRecurring()
    {
        return $this->getParameter('recurring');
    }
}
