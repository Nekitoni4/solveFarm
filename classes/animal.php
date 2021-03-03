<?php declare(strict_types=1);

namespace animal;


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
 * Определяем формат выходного продукта
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
        $this->potentialQuantityProduct = rand(8, 12);
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
}



class Chicken extends FarmAnimal
{

    use productCollector;

    public function __construct(string $idAnimal)
    {
        $this->idAnimal = $idAnimal;
        $this->potentialQuantityProduct = rand(0, 1);
        $this->animalType = 'Курица';
    }


    public function productLog(): void
    {
        echo 'Курица с личным номером ' . $this->idAnimal . ' насидела ' . $this->potentialQuantityProduct . ' яиц' . PHP_EOL;
    }
}

