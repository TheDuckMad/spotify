<?php
namespace App;

class Autoloader
{
static function register(): void
{
spl_autoload_register([
__CLASS__,
'autoload'
]);
}

static function autoload($class): void
{
// On récupère dans $Models la totalité du namespace de la classe concernée (App\Client\Compte)
// On retire App\ (Client\Compte)
$class = str_replace(__NAMESPACE__ . '\\', '', $class);

// On remplace les \ par des /
$class = str_replace('\\', '/', $class);

$fichier = DIR . '/' . $class . '.php';
    // On vérifie si le fichier existe
    if(file_exists($fichier)){
    require_once $fichier;
    }
    }
}

