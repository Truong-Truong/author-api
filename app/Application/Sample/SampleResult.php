<?php
declare(strict_types=1);

namespace App\Application\Sample;

final class SampleResult
{
    /**
     * @var string
     */
    public $sampleId;

    /**
     * @var string
     */
    public $name;

    /**
     * @param string $sampleId
     * @param string $name
     */
    public function __construct(
        string $sampleId,
        string $name
    )
    {
        $this->sampleId = $sampleId;
        $this->name = $name;
    }
}