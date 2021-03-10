
<?php
include __DIR__ . '/vendor/autoload.php';

use Classes\Farm\{Farm};
use Classes\Animal\{Chicken, Cow};


/**
 * @return [void]
 * Запускает цикл событий фермы
 * 
 */


function runFarm()
{
    $farm = new Farm();

    for ($id = 1; $id <= 10; ++$id) {
        $chicken = new Chicken($id);
        $farm->setFarmAccounting($chicken);
    }

    for ($id = 1; $id <= 20; ++$id) {
        $cow = new Cow($id);
        $farm->setFarmAccounting($cow);
    }

    $farm->renderAnimalProductsLog();
    $farm->renderProductsStat();
}


runFarm();

