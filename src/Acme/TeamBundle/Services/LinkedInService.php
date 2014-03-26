<?php

namespace Acme\TeamBundle\Services;

use HappyR\LinkedIn\LinkedIn;

/**
 * Extends the LinkedIn class
 */
class LinkedInService extends LinkedIn
{
    /**
     * @var string scope
     *
     */
    protected $scope;

    /**
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        if(isset($config['scope']))
        $this->scope = $config['scope'];

        parent::__construct($config['appId'], $config['secret']);
    }

    /**
     * Set the scope
     *
     * @param array $params
     *
     * @return string
     */
    public function getLoginUrl($params = array())
    {
        if (!isset($params['scope']) || $params['scope'] == "") {
            $params['scope'] = $this->scope;
        }

        return parent::getLoginUrl($params);
    }

    /**
     * I overrided this function because I want the default user array to include email-address
     */
    protected function getUserFromAccessToken() {
        try {
            return $this->api('/v1/people/~:(id,firstName,lastName,headline,email-address)');
        } catch (LinkedInApiException $e) {
            return null;
        }
    }
}