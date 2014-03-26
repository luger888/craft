<?php

namespace Acme\TeamBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/update');
    }

}
