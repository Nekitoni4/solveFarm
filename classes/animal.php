<?php

declare(strict_types=1);

namespace Classes\Animal;

use Exception;

/**
 * [Description FarmAnimal]
 * Определяет уникальный номер, тип животного и потенциальный выходной продукт, а также способ вывода информации
 * 
 */
abstract class FarmAnimal
{
    protected $idAnimal, $animalType, $quantityProducts, $minPotentialQuantity, $maxPotentialQuantity;


    /**
     * @return [void]
     * 
     * Выводим информацию о результате каждого животного
     */
    abstract protected function productLog();
}


/**
 * [Description productCollector]
 * 
 * Определяем методы для получения типа животного и получения продукции
 */
trait productGetter

{
    /**
     * @return array
     * 
     * Получаем тип животного
     */
    public function getTypeAnimal()
    {
        return $this->animalType;
    }


    /**
     * @return [type]
     * 
     * Получаем продукцию
     */
    public function getProducts()
    {
        return $this->quantityProducts;
    }
}



/**
 * [Description productsSetter]
 * 
 * Определяем методы для сбора продукции
 */
trait productCollector
{
    use productGetter;
    /**
     * @param int $lowRange
     * @param int $highRange
     * 
     * @return [void] Получаем с каждого животного необходимую продукцию
     */
    public function collectProducts()
    {
        $this->quantityProducts = rand($this->minPotentialQuantity, $this->maxPotentialQuantity);
        return $this->getProducts();
    }
}




/**
 * [Description Cow]
 * 
 * Класс для создания экземпляра коровы
 */
class Cow extends FarmAnimal
{

    protected $minPotentialQuantity = 8;
    protected $maxPotentialQuantity = 12;

    use productCollector;


    public function __construct(string $idAnimal)
    {
        $this->idAnimal = $idAnimal;
        $this->animalType = 'Корова';
    }


    /**
     * @return void
     * 
     * Конкретная реализация вывода результата надоя коровы
     */
    public function productLog(): void
    {
        if (isset($this->quantityProducts)) {
            echo 'Корова с личным номером ' . $this->idAnimal . ' надоила ' .  $this->quantityProducts . ' л молока' . PHP_EOL;
        } else {
            echo 'Упс, продукция ещё не собрана';
        }
    }
}



class Chicken extends FarmAnimal
{
    use productCollector;

    protected $minPotentialQuantity = 0;
    protected $maxPotentialQuantity = 1;

    public function __construct(string $idAnimal)
    {
        $this->idAnimal = $idAnimal;
        $this->animalType = 'Курица';
    }


    public function productLog(): void
    {
        if (isset($this->quantityProducts)) {
            echo 'Курица с личным номером ' . $this->idAnimal . ' насидела ' . $this->quantityProducts . ' яиц' . PHP_EOL;
            return;
        }
        echo 'Упс, продукция ещё не собрана!';
    }
}
