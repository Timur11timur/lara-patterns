<?php

//Have interface and base class implementing that interface. All other wrappers have constructor + implementation

interface CarService {
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService {
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic inspection';
    }
}

class OilChange implements CarService {
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and oil change';
    }
}

class TireRotation implements CarService {
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and tire rotation';
    }
}

echo (new BasicInspection())->getCost();
echo PHP_EOL;
echo (new OilChange(new BasicInspection()))->getCost();
echo PHP_EOL;
echo (new TireRotation(new OilChange(new BasicInspection())))->getCost();
echo PHP_EOL;
echo (new TireRotation(new BasicInspection()))->getCost();
echo PHP_EOL;

$services = new OilChange(new TireRotation(new BasicInspection));
echo $services->getDescription();
echo PHP_EOL;
