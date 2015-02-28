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
        $data['suboption'] = $this->getIssuer();

        return $data;
    }
}
