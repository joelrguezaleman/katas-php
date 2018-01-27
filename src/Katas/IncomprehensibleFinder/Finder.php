<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class Finder
{
    /** @var AgeDifferenceFinder **/
    private $ageDifferenceFinder;

    /** @var Person[] */
    private $people;

    public function __construct(array $people, AgeDifferenceFinder $ageDifferenceFinder)
    {
        $this->ageDifferenceFinder = $ageDifferenceFinder;
        $this->people = $people;
    }

    public function find(int $findCriteria): AgeDifferenceBetweenTwoPeople
    {
        /** @var AgeDifferenceBetweenTwoPeople[] $ageDifferences */
        $ageDifferences = $this->getAllAgeDifferencesBetweenAllPeople();

        if (empty($ageDifferences)) {
            return new AgeDifferenceBetweenTwoPeople();
        }

        if ($findCriteria === FindCriteria::CLOSEST) {
            return $this->ageDifferenceFinder->getClosestAgeDifference($ageDifferences);
        } else {
            return $this->ageDifferenceFinder->getFurthestAgeDifference($ageDifferences);
        }
    }

    private function getAllAgeDifferencesBetweenAllPeople(): array
    {
        $ageDifferences = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $ageDifferences[] = new AgeDifferenceBetweenTwoPeople(
                    $this->people[$i],
                    $this->people[$j]
                );
            }
        }

        return $ageDifferences;
    }
}
