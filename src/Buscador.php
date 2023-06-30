<?php

namespace Josewillian\BuscadorCursos;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private ClientInterface $httpclient;
    private Crawler $crawler;

    /**
     * @param ClientInterface $httpclient
     * @param Crawler $crawler
     */
    public function __construct(ClientInterface $httpclient, Crawler $crawler)
    {
        $this->httpclient = $httpclient;
        $this->crawler = $crawler;
    }

    /**
     * @throws GuzzleException
     */
    public function buscar(string $url): array
    {
        $resposta = $this->httpclient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
