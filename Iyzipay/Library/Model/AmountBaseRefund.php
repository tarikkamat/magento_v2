<?php

namespace Iyzico\Iyzipay\Library\Model;

use Iyzico\Iyzipay\Library\IyzipayResource;
use Iyzico\Iyzipay\Library\Model\Mapper\AmountBaseRefundMapper;
use Iyzico\Iyzipay\Library\Options;
use Iyzico\Iyzipay\Library\Request\AmountBaseRefundRequest;

class AmountBaseRefund extends IyzipayResource
{
    private string $paymentId;
    private float $price;
    private string $ip;

    public static function create(AmountBaseRefundRequest $request, Options $options): AmountBaseRefund
    {
        $uri = '/v2/payment/refund';
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options, true), $request->toJsonString());
        return AmountBaseRefundMapper::create($rawResult)->jsonDecode()->mapAmountBaseRefund(new AmountBaseRefund());
    }

    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    public function setPaymentId(string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }
}