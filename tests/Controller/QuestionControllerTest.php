<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuestionControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();

        $client->request('GET', '/question/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());


    }

    public function testTitleExistence()
    {
        $client = static::createClient();
        $client->request('GET', '/question/');
        $this->assertSelectorTextContains('html h1', 'Question index');

    }


}
