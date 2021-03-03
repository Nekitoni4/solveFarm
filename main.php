
<?php

require_once (realpath(__DIR__ . '/classes') . DIRECTORY_SEPARATOR . 'animal.php');
require_once (realpath(__DIR__ . '/classes') . DIRECTORY_SEPARATOR . 'farm.php');

use \animal\{Chicken, Cow};
use \farm\Farm;



/**
 * @return [void]
 * Запускает цикл событий фермы
 * 
 */
function runFarm() {
    $farm = new Farm();

    for ($id = 0; $id <= 10; ++$id) {
        $chicken = new Chicken($id);
        $farm->setFarmAccounting($chicken);
    }

    for ($id = 0; $id <= 20; ++$id) {
        $cow = new Cow($id);
        $farm->setFarmAccounting($cow);
    }

    $farm->renderAnimalProductsLog();
    $farm->getProductsStat();    
}


runFarm();






