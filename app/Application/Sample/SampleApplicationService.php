<?php
declare(strict_types=1);

namespace App\Application\Sample;

use App\Application\Sample\SampleCommand;
use App\Application\Sample\SampleGetResult;
use App\Infrastructure\Sample\ISampleRepository;

final class SampleApplicationService
{
    /**
     * @var ISampleRepository
     */
    private $sampleRepository;

    /**
     * SampleApplicationService constructor.
     * @param ISampleRepository $sampleRepository
     */
    public function __construct(ISampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    /**
     * @param SampleCommand $command
     * @return SampleGetResult
     */
    public function handle(SampleCommand $command): SampleGetResult
    {
        $samples = $this->sampleRepository->findAll();
        return new SampleGetResult(
            $samples
        );
    }
}
