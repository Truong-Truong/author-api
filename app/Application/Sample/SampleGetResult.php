<?php
declare(strict_types=1);

namespace App\Application\Sample;

final class SampleGetResult
{
    /**
     * @var array
     */
    public $samples;

    /**
     * @param \App\Application\SampleResult[] $samples
     */
    public function __construct(array $samples)
    {
        $this->samples = $samples;
    }
}
