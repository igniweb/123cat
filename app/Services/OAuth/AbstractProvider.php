<?php namespace App\Services\OAuth;

use GuzzleHttp\ClientInterface;
use App\Services\OAuth\Exceptions\InvalidTokenException;
use App\Services\OAuth\Exceptions\UnknownUserException;

abstract class AbstractProvider implements ProviderInterface {
    
    /**
     * OAuth provider options.
     *
     * @var array
     */
    protected $options;

    /**
     * HTTP client object.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * Class instance constructor.
     *
     * @param array $options
     * @param \GuzzleHttp\ClientInterface $client
     * @return void
     */
    public function __construct(array $options, ClientInterface $client)
    {   
        $this->client = $client;

        // Whitelist options
        $fields = ['client_id', 'client_secret', 'redirect_uri', 'scopes'];
        foreach ($options as $option => $value)
        {
            if (in_array($option, $fields))
            {
                $this->options[$option] = $value;
            }
        }
    }

    /**
     * Return provider authorization URL.
     *
     * @return string
     */
    abstract public function authorizationUrl();

    /**
     * POST request for connected account access token.
     *
     * @param string $code
     * @return \GuzzleHttp\Message\Response
     */
    abstract protected function requestAccessToken($token);

    /**
     * Return user array associated with the token.
     *
     * @param string $token
     * @return array|false
     */
    abstract protected function userByToken($token);

    /**
     * Map object to fit \App\User object.
     *
     * @param array $rawUser
     * @return \App\User|false
     */
    abstract protected function mapUser(array $rawUser);

    /**
     * Return access token associated with code.
     *
     * @param string $code
     * @throws \App\Services\OAuth\Exceptions\InvalidTokenException
     * @return string
     */
    public function accessToken($code)
    {
        $response = $this->requestAccessToken($code);

        $data = $response->json();
        if (empty($data['access_token']))
        {
            throw new InvalidTokenException('Invalid token matching "' . $code . '"');
        }

        return $data['access_token'];
    }

    /**
     * Return authenticated User instance.
     *
     * @param string $token
     * @throws \App\Services\OAuth\Exceptions\UnknownUserException
     * @return \App\User
     */
    public function user($token)
    {
        $rawUser = $this->userByToken($token);
        if ( ! empty($rawUser))
        {
            $user = $this->mapUser($rawUser);
        }

        if (empty($user))
        {
            throw new UnknownUserException('Unknow user associated with token "' . $token . '"');
        }

        return $user;
    }

}
