<?php

namespace App\Http\Controllers;

use App\Application\Sample\SampleApplicationService;
use App\Application\Sample\SampleCommand;
use App\Infrastructure\Sample\SampleRepository;
use Illuminate\Http\Request;

class SampleGetController extends Controller
{

    /**
     * @var SampleRepository
     */
    private $sampleRepository;

    /**
     * SampleController constructor.
     */
    public function __construct()
    {
        $this->sampleRepository = new SampleRepository();
    }

    /**
     * SampleController handle.
     * 
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function handle(Request $request): array
    {
        $command = new SampleCommand(data_get($request, 'sampleId'));

        $service = new SampleApplicationService(
            $this->sampleRepository
        );

        $data = $service->handle($command);
        return [
            'data' => $data->samples
        ];
    }
}
