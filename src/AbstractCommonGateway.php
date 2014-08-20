<?php

namespace Omnipay\Helcim;

use Omnipay\Common\AbstractGateway;

/**
 * Helcim Gateway Driver methods common to (shared between) Hosted Page
 * and Direct modes.
 */
abstract class AbstractCommonGateway extends AbstractGateway
{
    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '',
            'gatewayToken' => '',
            'method' => array('GET', 'POST'),
            'testMode' => array(0, 1),
            'developerMode' => array(0, 1),
            'shippingAmount' => 0,
            'taxAmount' => 0,
        );
    }

    /**
     * The Merchant ID is always needed.
     */
    public function setMerchantId($merchant_id)
    {
        if ( ! is_numeric($merchant_id)) {
            throw new InvalidRequestException('Merchant ID must be numeric');
        }

        return $this->setParameter('merchantId', $merchant_id);
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * The Gateway Token is always needed.
     * It provides access to the backend, and is always kept secret
     * from end users.
     */
    public function setGatewayToken($gateway_token)
    {
        return $this->setParameter('gatewayToken', $gateway_token);
    }

    public function getGatewayToken()
    {
        return $this->getParameter('gatewayToken');
    }

    /**
     * The developer mode affects the endpoint URL.
     */
    public function setDeveloperMode($value)
    {
        return $this->setParameter('developerMode', $value);
    }

    public function getDeveloperMode()
    {
        return $this->getParameter('developerMode');
    }

    /**
     * The method used to redirect, i.e. to send the user to the payment form.
     * GET or POST.
     */
    public function setMethod($method)
    {
        return $this->setParameter('method', $method);
    }

    public function getMethod()
    {
        return $this->getParameter('method');
    }

}
