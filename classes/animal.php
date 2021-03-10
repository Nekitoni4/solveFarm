<?php declare(strict_types=1);

namespace Classes\Animal;


/**
 * [Description FarmAnimal]
 * Определяет уникальный номер, тип животного и потенциальный выходной продукт, а также способ вывода информации
 * 
 */
abstract class FarmAnimal
{
    protected $idAnimal;
    protected $animalType;
    protected $potentialQuantityProduct;


    /**
     * @return [void]
     * 
     * Выводим информацию о результате каждого животного
     */
    protected function productLog(){}
}


/**
 * [Description productCollector]
 * 
 * Определяем формат и количесвто потенциального выходного продукта
 */
trait productCollector

{
    /**
     * @return array
     * 
     * Выводим массив из количества выходного продукта и тип животного
     */
    public function giveProduct(): array
    {
        return [$this->potentialQuantityProduct, $this->animalType];
    }

    /**
     * @param int $lowRange
     * @param int $highRange
     * 
     * @return [void] Присваиваем каждому экземпляру животного количество продукции которое должно получиться
     */
    public function setPotentialQuantityProduct(int $lowRange, int $highRange) {
        return $this->potentialQuantityProduct = rand($lowRange, $highRange);
    }
}


/**
 * [Description Cow]
 * 
 * Класс для создания экземпляра коровы
 */
class Cow extends FarmAnimal
{

    use productCollector;


    public function __construct(string $idAnimal)
    {
        $this->idAnimal = $idAnimal;
        $this->setPotentialQuantityProduct(8, 12);
        $this->animalType = 'Корова';
    }


    /**
     * @return void
     * 
     * Конкретная реализация вывода результата надоя коровы
     */
    public function productLog(): void
    {
        echo 'Корова с личным номером ' . $this->idAnimal . ' надоила ' . $this->potentialQuantityProduct . ' л молока' . PHP_EOL;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'idAnimal':
                return $this->idAnimal;
            case 'animalType':
                return $this->animalType;
            case 'potentialQuantityProduct':
                return $this->setPotentialQuantityProduct(8, 12);
        }
    }
}



class Chicken extends FarmAnimal
{
    use productCollector;

    public function __construct(string $idAnimal)
    {
        $this->idAnimal = $idAnimal;
        $this->animalType = 'Курица';
        $this->setPotentialQuantityProduct(0, 1);
    }


    public function productLog(): void
    {
        echo 'Курица с личным номером ' . $this->idAnimal . ' насидела ' . $this->potentialQuantityProduct . ' яиц' . PHP_EOL;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'idAnimal':
                return $this->idAnimal;
            case 'animalType':
                return $this->animalType;
            case 'potentialQuantityProduct':
                return $this->setPotentialQuantityProduct(0, 1);
        }
    }
}

