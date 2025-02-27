<?php

namespace Iyzico\Iyzipay\Library;

class IyzipayResource extends ApiResource
{
    private $status;
    private $errorCode;
    private $errorMessage;
    private $errorGroup;
    private $locale;
    private $systemTime;
    private $conversationId;

    protected static function getHttpHeadersV2($uri, Request $request = null, Options $options, bool $addRandom = false)
    {
        $header = array(
            "Accept: application/json",
            "Content-type: application/json",
        );

        $rnd = uniqid();
        array_push($header, "Authorization: " . self::prepareAuthorizationStringV2($uri, $request, $options, $rnd));
        $addRandom && array_push($header, "x-iyzi-rnd: " . $rnd);
        array_push($header, "x-iyzi-client-version: " . "iyzipay-php-2.0.57");

        return $header;
    }

    protected static function prepareAuthorizationStringV2($uri, Request $request = null, Options $options, $rnd)
    {
        $hash = IyziAuthV2Generator::generateAuthContent($uri, $options->getApiKey(), $options->getSecretKey(), $rnd, $request);

        return 'IYZWSv2' . ' ' . $hash;
    }

    protected static function getHttpHeadersIsV2($uri, Request $request = null, Options $options, bool $addRandom = false)
    {
        $header = array(
            "Accept: application/json",
            "Content-type: application/json",
        );

        $rnd = uniqid();
        array_push($header, "Authorization: " . self::prepareAuthorizationStringV2($uri, $request, $options, $rnd));
        $addRandom && array_push($header, "x-iyzi-rnd: " . $rnd);
        array_push($header, "x-iyzi-client-version: " . "iyzipay-php-2.0.57");

        return $header;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    public function getErrorGroup()
    {
        return $this->errorGroup;
    }

    public function setErrorGroup($errorGroup)
    {
        $this->errorGroup = $errorGroup;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getSystemTime()
    {
        return $this->systemTime;
    }

    public function setSystemTime($systemTime)
    {
        $this->systemTime = $systemTime;
    }

    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function setConversationId($conversationId)
    {
        $this->conversationId = $conversationId;
    }
}
