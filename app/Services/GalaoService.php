<?php

namespace App\Services;

use Goutte\Client as GClient;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class GalaoService {

    private $token = null;

    private static function isTokenValid($token): bool
    {
        $client = new Client();
        $response = $client->get('https://galao.cnam.fr/galao/bilans/affiche_bilans.php?uid='.$token);
        return !Str::contains($response->getBody()->getContents(), [
            'Connexion interrompue.',
            'Impossible d\'établir la connection avec le serveur de base de données'
        ]);
    }

    public function login() : void
    {
        $token = Cache::get('galao_token');

        if(self::isTokenValid($token)) {
            $this->token = $token;
            return;
        }

        $client = new Client();
        $response = $client->post('https://galao.cnam.fr/galao/entree/identification_visiteur.php', [
            'form_params' => [
                'ecole' => -1,
                'ecole_type' => 1,
                'centre' => 6,
                'user' => env('GALAO_LOGIN'),
                'password' => env('GALAO_PASSWORD'),
                'ch_ecole' => -1,
                'bouton' => 'Entrer dans GALAO',
            ]
        ]);

        $matchesCount = preg_match('/(abb.{21})/', $response->getBody(), $matches);

        if($matchesCount > 0) {
            $token = $matches[0];
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://galao.cnam.fr/galao/bilans/visu_bilans.php?uid='.$token.'&bilan=planning_individuel&liste=un&no_fiche=1');
        $response->getBody();

        if(self::isTokenValid($token)) {
            Cache::put('galao_token', $token);
            $this->token = $token;
        } else {
            throw new \RuntimeException('Cannot login to Galao');
        }
    }

    public function getToken() : string
    {
        if($this->token === null) {
            $this->login();
        }

        return $this->token;
    }

    public function getPlanningCrawler(): ?\Symfony\Component\DomCrawler\Crawler
    {
        $planningUrl = 'https://galao.cnam.fr/galao/fiche_perso/affiche_infos_planning_html_appren.php?uid=';

        $client = new GClient();
        return $client->request('GET', $planningUrl.$this->getToken());
    }

    public function getNotesCrawler(): ?\Symfony\Component\DomCrawler\Crawler
    {
        $notesUrl = 'https://galao.cnam.fr/galao/bilans/affiche_onglets_bilans_result.php?uid='.$this->getToken().'&bilan=academique';

        $client = new GClient();
        return $client->request('GET', $notesUrl.$this->getToken());
    }
}
