<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getLatest()
    {
        return $this->project->getLatest();
    }

    public function create(ProjectRequest $request){
        $project = $request->user()->projects()->create($request->all());

        $path = $request->file->store('public/projects/'.$project->id.'/files/');
        $name = basename($path);
        $project->files()->create([
            'path' => 'storage/projects/'.$project->id.'/files/'.$name
        ]);
        $project->load('files');

        return ['success' => 1, 'project' => $project];
    }

}
