<?php

include __DIR__.'/../vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
try {
    $response = $client->request('GET', 'https://news.rambler.ru/world/42939565-delo-mh-17-niderlandy-mstyat-ukraine/');
    $statusCode = $response->getStatusCode();
// $statusCode = 200
    $contentType = $response->getHeaders()['content-type'][0];
// $contentType = 'application/json'
    $content = $response->getContent();

} catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface $e) {
}


$crawler = new Crawler($content);

$v = $crawler->filter('div.article__content')->html();

print_r($v);
die();