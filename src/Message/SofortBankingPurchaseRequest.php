<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments SOFORTbanking Purchase Request
 */
class SofortBankingPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'directebanking';

        return $data;
    }
}
