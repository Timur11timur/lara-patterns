<?php

//The user has just to implement one protected abstract method and the superclass do the job.

abstract class Sub {
    public function make(): Sub
    {
        return $this
            ->layBread()
            ->addLattuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected abstract function addPrimaryToppings(): Sub;

    protected function layBread(): Sub
    {
        var_dump('laying down the bread');

        return $this;
    }

    protected function addLattuce(): Sub
    {
        var_dump('add some lattuce');

        return $this;
    }

    protected function addSauces(): Sub
    {
        var_dump('add oil and vinegar');

        return $this;
    }
}

class TurkeySub extends Sub {
    protected function addPrimaryToppings(): TurkeySub
    {
        var_dump('add some turkey');

        return $this;
    }
}

class VeggieSub extends Sub {
    protected function addPrimaryToppings(): VeggieSub
    {
        var_dump('add some veggie');

        return $this;
    }
}

(new TurkeySub)->make();
echo PHP_EOL;
(new VeggieSub)->make();