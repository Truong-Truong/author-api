<?php
declare(strict_types=1);

namespace App\Infrastructure\Sample;

use App\Application\Sample\SampleResult;
use App\Infrastructure\Sample\ISampleRepository;

final class SampleRepository implements ISampleRepository
{
    /**
     * @return \App\Application\SampleResult[] $results results
     */
    public function findAll(): array
    {
        return [
            new SampleResult(
                '1',
                'abc'
            ),
            new SampleResult(
                '2',
                'fffff'
            )
        ];
    }
}
