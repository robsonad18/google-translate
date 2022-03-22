<?php 

require __DIR__."/vendor/autoload.php";

use \App\Text\Translate;

new class 
{
    /**
     * Text base da tradução
     *
     * @var string
     */
    private string $input   = "";

    /**
     * Idiomas tradução
     *
     * @var array
     */
    private array $langages = [];

    function __construct()
    {
        $this->input = $argv[1] ?? "Olá mundo";
        $this->langages = $argv[2] ?? ["en","es","fr","pt"];

        $result = Translate::run($this->input, $this->langages);

        foreach($result as $key => $value)
        {
            echo "A tradução em ".$key." é ".$value;
        }
    }
};