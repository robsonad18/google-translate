<?php 

namespace App\Text;

use Google\Cloud\Translate\V2\TranslateClient;

class Translate 
{
    /**
     * Chave do app
     */
    const KEY = "";

    /**
     * Cria instancia do cliente de tradução
     *
     * @return TranslateClient
     */
    private static function getClient()
    {
        return new TranslateClient([
            "key" => self::KEY
        ]);
    }


    /**
     * Metodo responsavel por executar a tradução dos textos
     *
     * @param string $input
     * @param array $targetLanguages
     * @return array
     */
    static function run(string $input, array $targetLanguages = []):array
    {
        $obClient = self::getClient();
        $response = [];
        foreach($targetLanguages as $language)
        {
            $result = $obClient->translate($input, [
                "target" => $language
            ]);
            $response[$language] = $result["text"];
        }
        return $response;
    }
}