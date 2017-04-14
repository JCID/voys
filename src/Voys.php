<?php

namespace Jcid\Voys;

use Assert\Assertion;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

final class Voys
{
    const API_URL = 'https://api.voipgrid.nl/api/clicktodial/';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->client = new Client();
        $this->validateLoginAndPassword($login, $password);
    }

    /**
     * @param string $fromPhonenumer
     * @param string $toPhonenumer
     *
     * @return string
     */
    public function callPhonenumer(string $toPhonenumer, string $fromPhonenumer): string
    {
        $this->validatePhonenumbers($toPhonenumer, $fromPhonenumer);

        $response = $this->client->request(
            'POST',
            self::API_URL,
            [
                RequestOptions::AUTH => [$this->login, $this->password],
                RequestOptions::JSON => [
                    VoysOptions::B_NUMBER => $toPhonenumer,
                    VoysOptions::A_NUMBER => $fromPhonenumer,
                ],
            ]
        );
        $voysResponse = new VoysResponse($response);

        return $voysResponse->getCallid();
    }

    /**
     * @param string $callid
     *
     * @return string
     */
    public function getCallStatus(string $callid): string
    {
        $this->validateCallId($callid);

        $response = $this->client->request(
            'GET',
            sprintf('%s%s/', self::API_URL, $callid),
            [
                RequestOptions::AUTH => [$this->login, $this->password],
            ]
        );
        $voysResponse = new VoysResponse($response);

        return $voysResponse->getStatus();
    }

    /**
     * @param string $login
     * @param string $password
     */
    private function validateLoginAndPassword(string $login, string $password): void
    {
        // Login validation
        Assertion::string($login, 'Login: Value "%s" expected to be string, type %s given.');
        Assertion::email($login, 'Login: Value "%s" was expected to be a valid e-mail address.');

        // Password validation
        Assertion::string($password, 'Password: Value "%s" expected to be string, type %s given.');

        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @param string $toPhonenumer
     * @param string $fromPhonenumer
     */
    private function validatePhonenumbers(string $toPhonenumer, string $fromPhonenumer): void
    {
        Assertion::notNull($toPhonenumer);
        Assertion::notNull($fromPhonenumer);
    }

    /**
     * @param string $callid
     */
    private function validateCallId($callid): void
    {
        Assertion::string($callid);
    }
}
