<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments iDeal Purchase Request
 */
class IdealPurchaseRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'ideal';

        return $data;
    }
}
