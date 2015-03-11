<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments SOFORTbanking Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class SofortBankingPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'directebanking';

        return $data;
    }
}
