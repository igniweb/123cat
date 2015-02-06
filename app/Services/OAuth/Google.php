<?php namespace App\Services\OAuth;

use App\Exceptions\OAuthException;
use App\User;
use GuzzleHttp\Exception\ClientException;

class Google extends AbstractProvider {
    
    /**
     * Return provider authorization URL.
     *
     * @return string
     */
    public function authorizationUrl()
    {
        $url = 'https://accounts.google.com/o/oauth2/auth?';

        return $url . http_build_query([
            'client_id'     => $this->options['client_id'],
            'redirect_uri'  => $this->options['redirect_uri'],
            'scope'         => implode(' ', $this->options['scopes']),
            'response_type' => 'code',
        ]);
    }

    /**
     * POST request for connected account access token.
     *
     * @param string $code
     * @throws \App\Exceptions\OAuthException
     * @return \GuzzleHttp\Message\Response
     */
    protected function requestAccessToken($code)
    {
        try
        {
            return $this->client->post('https://accounts.google.com/o/oauth2/token', [
                'body' => [
                    'code'          => $code,
                    'client_id'     => $this->options['client_id'],
                    'client_secret' => $this->options['client_secret'],
                    'redirect_uri'  => $this->options['redirect_uri'],
                    'grant_type'    => 'authorization_code',
                ],
            ]);
        }
        catch (ClientException $e)
        {
            throw new OAuthException('OAuth client exception on access token request');
        }
    }

    /**
     * Return user array associated with the token.
     *
     * @param string $token
     * @throws \App\Exceptions\OAuthException
     * @return array
     */
    protected function userByToken($token)
    {
        try
        {
            $response = $this->client->get('https://www.googleapis.com/plus/v1/people/me?' . http_build_query([
                // https://developers.google.com/+/api/latest/people?hl=fr
                'fields'       => 'id,url,name(familyName,givenName),displayName,emails/value,image/url',
                'alt'          => 'json',
                'access_token' => $token,
            ]));    
        }
        catch (ClientException $e)
        {
            throw new OAuthException('OAuth client exception on user fetching');
        }

        return $response->json();
    }

    /**
     * Map object to fit \App\User object.
     *
     * @param array $user
     * @throws \App\Exceptions\OAuthException
     * @return \App\User
     */
    protected function mapUser(array $user)
    {
        if (empty($user['emails'][0]['value']))
        {
            throw new OAuthException('OAuth client exception on user mapping');
        }

        $model = new User;

        $model->email = $user['emails'][0]['value'];
        $model->name = ! empty($user['displayName']) ? $user['displayName'] : null;
        $model->avatar = ! empty($user['image']['url']) ? $user['image']['url'] : null;

        return $model;
    }

}
