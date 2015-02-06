<?php namespace App\Services\OAuth;

use App\User;

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
     * @return \GuzzleHttp\Message\Response
     */
    protected function requestAccessToken($code)
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

    /**
     * Return user array associated with the token.
     *
     * @param string $token
     * @return array|false
     */
    protected function userByToken($token)
    {
        $url = 'https://www.googleapis.com/plus/v1/people/me?' . http_build_query([
            // https://developers.google.com/+/api/latest/people?hl=fr
            'fields'       => 'id,url,name(familyName,givenName),displayName,emails/value,image/url',
            'alt'          => 'json',
            'access_token' => $token,
        ]);
        $response = $this->client->get($url);

        $data = $response->json();
        if (empty($data) or ! empty($data['error']))
        {
            return false;
        }

        return $data;
    }

    /**
     * Map object to fit \App\User object.
     *
     * @param array $rawUser
     * @return \App\User|false
     */
    protected function mapUser(array $rawUser)
    {
        if (empty($rawUser['emails'][0]['value']))
        {
            return false;
        }

        $user = new User;
        $user->email = $rawUser['emails'][0]['value'];
        $user->name = ! empty($rawUser['displayName']) ? $rawUser['displayName'] : null;
        $user->avatar = ! empty($rawUser['image']['url']) ? $rawUser['image']['url'] : null;

        return $user;
    }

}
