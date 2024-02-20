<?php

class Fighter {
    public int $healthPoints = 100;
    private int $strength;

    public function __construct(private readonly string $name)
    {
        $strength = rand(1, 10);
    }

    public function fight($opponent)
    {
        $opponent->healtPoints = $opponent->healtPoints - $this->strength;
        $this->healthPoints = $this->healthPoints - $opponent->strength / 2;
    }

    public function isAlive()
    {
        if ($this->healthPoints === 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getName() {
        return $this->name;
    }
}

$batman = new Fighter('Batman');
$joker = new Fighter('Joker');

while ($batman->isAlive() && $joker->isAlive()) {
    if (rand(0, 1)) {
        $batman->fight($joker);
        $joker->fight($batman);
    } else {
        $joker->fight($batman);
        $batman->fight($joker);
    }
}

if ($batman->isAlive()) {
    echo $batman->getName() . ' wins!';
} else {
    echo $joker->getName() . ' wins!';
}

