<?php

namespace farm;

require_once (realpath(__DIR__) . DIRECTORY_SEPARATOR . 'animal.php');

use animal\FarmAnimal;


/**
 * [Description Farm]
 * Данный класс возвращает экземпляр Фермы
 */
class Farm
{
    /**
     * @var array
     */
    private $animalTracking = [];
    /**
     * @var array
     */
    private $productTracking = [];


    /**
     * @return [void]
     * Рассчитывает и выводит на экран результативность каждого животного
     */
    private function calculateProductsStat()
    {   
        $reducedProducts = array_map(function($animalProducts){
            return array_reduce($animalProducts, function($curr, $next) {
                return $curr + $next;
            });
        }, $this->productTracking);

        foreach($reducedProducts as $animal => $productQuantity) {
            echo $animal . ': на выходе ' . $productQuantity . ' единиц продукта' . PHP_EOL;
        }
    }


    public function getProductsStat() {
        $this->calculateProductsStat();
    }



    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * Добавляет экземпляр каждого животного в хлев
     */
    private function setAnimalAccounting(FarmAnimal $animal)
    {
        array_push($this->animalTracking, $animal);
    }



    /**
     * @return [void]
     * 
     * Выводит на экран количество получившегося на выходе продукта у каждого животного
     */
    public function renderAnimalProductsLog()
    {
        foreach($this->animalTracking as $animal) {
            echo $animal->productLog();
        }
    }


    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * Добавляет в хранилище каждую продукцию и распределяет по видам животных
     * 
     */
    private function setProductsAccounting(FarmAnimal $animal)
    {
        [$quantityProducts, $animalType] = $animal->giveProduct();
        if (isset($this->productTracking[$animalType])) {
            array_push($this->productTracking[$animalType], $quantityProducts);
            return;
        }
        $this->productTracking[$animalType] = [$quantityProducts];
    }



    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * Занимается распределением продукции и учётом животных
     */
    public function setFarmAccounting(FarmAnimal $animal)
    {
        $this->setProductsAccounting($animal);
        $this->setAnimalAccounting($animal);
    }
}
