<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class Finder
{
    /** @var Person[] */
    private $_p;

    public function __construct(array $p)
    {
        $this->_p = $p;
    }

    public function find(int $ft): F
    {
        /** @var F[] $tr */
        $tr = [];

        for ($i = 0; $i < count($this->_p); $i++) {
            for ($j = $i + 1; $j < count($this->_p); $j++) {
                $r = new F();

                if ($this->_p[$i]->birthDate < $this->_p[$j]->birthDate) {
                    $r->person1 = $this->_p[$i];
                    $r->person2 = $this->_p[$j];
                } else {
                    $r->person1 = $this->_p[$j];
                    $r->person2 = $this->_p[$i];
                }

                $r->d = $r->person2->birthDate->getTimestamp()
                    - $r->person1->birthDate->getTimestamp();

                $tr[] = $r;
            }
        }

        if (count($tr) < 1) {
            return new F();
        }

        $answer = $tr[0];

        foreach ($tr as $result) {
            switch ($ft) {
                case FT::ONE:
                    if ($result->d < $answer->d) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->d > $answer->d) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
