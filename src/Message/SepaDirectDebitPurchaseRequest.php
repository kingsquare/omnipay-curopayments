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

        return $data;
    }
}
