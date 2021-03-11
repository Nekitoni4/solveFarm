
<?php
include __DIR__ . '/vendor/autoload.php';

use Classes\Farm\{Farm};
use Classes\Animal\{Chicken, Cow};


/**
 * @return [void]
 * Инициализируем экземпляр фермы животными и возвращаем его
 * 
 */


function runFarm(): \Classes\Farm\Farm
{
    $farm = new Farm();

    for ($id = 1; $id <= 10; ++$id) {
        $chicken = new Chicken($id);
        $farm->addAnimalAccounting($chicken);
    }

    for ($id = 1; $id <= 20; ++$id) {
        $cow = new Cow($id);
        $farm->addAnimalAccounting($cow);
    }
    return $farm;
}

