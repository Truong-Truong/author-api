<?php
declare(strict_types=1);

namespace App\Application\Sample;

final class SampleCommand
{
    /**
     * @var string
     */
    private $sampleId;

    /**
     * SampleCommand constructor.
     * @param string $sampleId
     */
    public function __construct(?string $sampleId)
    {
        $this->sampleId = $sampleId;
    }

    /**
     * @return string
     */
    public function getSampleId(): ?string
    {
        return $this->sampleId;
    }
}
