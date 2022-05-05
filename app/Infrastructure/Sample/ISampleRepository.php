<?php
declare(strict_types=1);

namespace App\Infrastructure\Sample;

interface ISampleRepository
{
    /**
     * @return \App\Application\SampleResult[] $results results
     */
    public function findAll(): array;
}
