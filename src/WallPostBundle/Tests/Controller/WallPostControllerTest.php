<?php

namespace WallPostBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class WallPostControllerTest extends WebTestCase
{
	public function testIndex()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/');

		$form = $crawler->filter('form[name="wallpost_post"]');
		$this->assertSame(1, $form->count());

		$this->postFormElementsTest($form);
	}

	public function testCreate()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/create');

		$form = $crawler->filter('form[name="wallpost_post"]');
		$this->assertSame(1, $form->count());

		$this->postFormElementsTest($form);

		$token = $crawler->filter('input[name="wallpost_post[_token]"]')->first()->attr('value');

		$client->request('post', '/create', [
			'wallpost_post' => [
				'title'  => 'Testing Controllers in Symfony2',
				'author' => 'author',
				'body'   => 'body',
				'_token' => $token
			]
		]);

		$this->assertTrue($client->getResponse()->isRedirect('/'));
	}

	protected function postFormElementsTest(Crawler $form) {
		$this->assertSame(1, $form->filter('input[name="wallpost_post[title]"]')->count());
		$this->assertSame(1, $form->filter('input[name="wallpost_post[author]"]')->count());
		$this->assertSame(1, $form->filter('textarea[name="wallpost_post[body]"]')->count());
		$this->assertSame(1, $form->filter('button[type="submit"]')->count());
		$this->assertSame(1, $form->filter('input[name="wallpost_post[_token]"]')->count());
	}

}
