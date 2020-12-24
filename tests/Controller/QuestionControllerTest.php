<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuestionControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();

        $client->request('GET', '/question');
        $string='{"message":"Welcome to your new controller irisi!"}';
        echo $client->getResponse()->getContent();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals($string, $client->getResponse()->getContent());
        $this->assertTrue($client->getResponse()->isSuccessful());

    }
}
