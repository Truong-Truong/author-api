<?php

namespace App\Http\Controllers\API;

use App\Application\Employee\EmployeeCreateCommand;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobRES;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobAll extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return response([ 'job' => JobRES::collection($jobs), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $request)
    {
        $employeeCreateCommand = EmployeeCreateCommand::fromRequest($request)->toArray();

        $validator = Validator::make($employeeCreateCommand, [
            'name' => 'required|max:255',
            'major' => 'required|max:255',
            'job' => 'required|max:255',
            'company' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $job = Job::create($employeeCreateCommand);

        return response([ 'job' => new JobRES($job), 'message' => 'Created successfully'], 200);
    }

    public function show(Job $job)
    {
        return response([ 'job' => new JobRES($job), 'message' => 'Retrieved successfully'], 200);

    }

    public function update(Request $request, Job $job)
    {

        $job->update($request->all());

        return response([ 'job' => new JobRES($job), 'message' => 'Retrieved successfully'], 200);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return response(['message' => 'Deleted']);
    }
}

