<?php

namespace Katas\FizzBuzz\PHP;

class FizzBuzz
{
    public function get(int $number): string
    {
        if ($this->isFizzBuzz($number)) {
            return 'FizzBuzz';
        }

        if ($this->isBuzz($number)) {
            return 'Buzz';
        }

        return $this->isFizz($number) ? 'Fizz' : $number;
    }

    private function isFizzBuzz(int $number): bool
    {
        return $this->isFizz($number) && $this->isBuzz($number);
    }

    private function isFizz(int $number): bool
    {
        return $number % 3 == 0;
    }

    private function isBuzz(int $number): bool
    {
        return $number % 5 == 0;
    }
}
