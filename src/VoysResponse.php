<?php

namespace Jcid\Voys;

use GuzzleHttp\Psr7\Response;
use Webmozart\Json\JsonDecoder;

final class VoysResponse
{
    /**
     * @var string
     */
    private $a_cli;

    /**
     * @var string
     */
    private $a_number;

    /**
     * @var bool
     */
    private $auto_answer;

    /**
     * @var string
     */
    private $b_cli;

    /**
     * @var string
     */
    private $b_number;

    /**
     * @var string
     */
    private $callid;

    /**
     * @var string
     */
    private $created;

    /**
     * @var string
     */
    private $originating_ip;

    /**
     * @var string
     */
    private $resource_uri;

    /**
     * @var string
     */
    private $status;

    /**
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $jsonDecoder    = new JsonDecoder();
        $responseObject = $jsonDecoder->decode($response->getBody()->getContents());

        $this->a_cli          = $responseObject->a_cli;
        $this->a_number       = $responseObject->a_number;
        $this->auto_answer    = $responseObject->auto_answer;
        $this->b_cli          = $responseObject->b_cli;
        $this->b_number       = $responseObject->b_number;
        $this->callid         = $responseObject->callid;
        $this->created        = $responseObject->created;
        $this->originating_ip = $responseObject->originating_ip;
        $this->resource_uri   = $responseObject->resource_uri;
        $this->status         = $responseObject->status;
    }

    /**
     * @return string
     */
    public function getACli(): string
    {
        return $this->a_cli;
    }

    /**
     * @return string
     */
    public function getANumber(): string
    {
        return $this->a_number;
    }

    /**
     * @return bool
     */
    public function isAutoAnswer(): bool
    {
        return $this->auto_answer;
    }

    /**
     * @return string
     */
    public function getBCli(): string
    {
        return $this->b_cli;
    }

    /**
     * @return string
     */
    public function getBNumber(): string
    {
        return $this->b_number;
    }

    /**
     * @return string
     */
    public function getCallid(): string
    {
        return $this->callid;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getOriginatingIp(): string
    {
        return $this->originating_ip;
    }

    /**
     * @return string
     */
    public function getResourceUri(): string
    {
        return $this->resource_uri;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
