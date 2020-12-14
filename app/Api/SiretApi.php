<?php


namespace App\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiretApi
{
    public function getOrganizationTitle(Request $request)
    {
        $siretNumber = $request->input('id');
        $url = sprintf('%s/%s', 'https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/', $siretNumber);
        $siren = Http::get($url)->json();

        if(isset($siren['etablissement'])){
            return $siren['etablissement']['libelle_voie'];
        }
        return null;

    }
}
