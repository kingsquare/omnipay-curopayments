<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments SEPA Direct debit Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class SepaDirectDebitPurchaseRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'directdebit';
        $data['recurring'] = (int) $this->getRecurring();

        return $data;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setRecurring($value)
    {
        return $this->setParameter('recurring', $value);
    }

    /**
     * @return int|null
     */
    public function getRecurring()
    {
        return $this->getParameter('recurring');
    }
}
