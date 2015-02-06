<?php namespace App\Services\OAuth;

interface ProviderInterface {
    
    /**
     * Return provider authorization URL.
     *
     * @return string
     */
    public function authorizationUrl();

    /**
     * Return access token associated with code.
     *
     * @param string $code
     * @throws \App\Services\OAuth\Exceptions\InvalidTokenException
     * @return string
     */
    public function accessToken($code);

    /**
     * Return authenticated User instance.
     *
     * @param string $token
     * @throws \App\Services\OAuth\Exceptions\UnknownUserException
     * @return \App\User
     */
    public function user($token);

}
