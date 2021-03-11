<?php

namespace Classes\Farm;


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
    public function renderProductsStat()
    {
        foreach ($this->productTracking as $animal => $productQuantity) {
            echo $animal . ': на выходе ' . $productQuantity . ' единиц продукта' . PHP_EOL;
        }
    }



    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * Реализация добавления экземпляра каждого животного в хлев
     */
    private function setAnimalAccounting(\classes\Animal\FarmAnimal $animal)
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
        foreach ($this->animalTracking as $animal) {
            echo $animal->productLog();
        }
    }


    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * Реализация сбора продукции с животных и связывания каждого вида с общим количеством продукции
     * 
     */
    private function setProductsAccounting(\classes\Animal\FarmAnimal $animal)
    {
        $animalType = $animal->getTypeAnimal();
        $quantityProducts = $animal->collectProducts();
        if (array_key_exists($animalType, $this->productTracking)) {
            $this->productTracking[$animalType] += $quantityProducts;
            return;
        }
        $this->productTracking[$animalType] = $quantityProducts;
    }



    /**
     * @param FarmAnimal $animal
     * 
     * @return [void]
     * 
     * "Интерфейс" добавления животного в хлев
     */
    public function addAnimalAccounting(\classes\Animal\FarmAnimal $animal)
    {
        $this->setAnimalAccounting($animal);
    }

    
    /**
     * @param \classes\Animal\FarmAnimal $animal
     * 
     * @return [void]
     * 
     * "Интерфейс" сбора продукции с животного
     */
    public function addProductsAccounting(\classes\Animal\FarmAnimal $animal)
    {
        $this->setProductsAccounting($animal);
    }
}
