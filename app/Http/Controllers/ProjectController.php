<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index(Client $client)
    {
        $this->authorize('view', Project::class);
        $projects = Project::withCount('tasks')->where('client_id', $client->id)->get();
        return view('projects.index', compact('projects', 'client'));
    }

    public function create(Client $client)
    {
        $this->authorize('create', Project::class);
        return view('projects.create', compact('client'));
    }

    public function store(StoreProjectRequest $request, Client $client)
    {
        $this->authorize('create', Project::class);
        $client->projects()->create($request->validated());
        return redirect()->route('clients.projects.index', $client)->with('success', 'Project updated successfully');
    }

    public function edit(Client $client, Project $project)
    {
        $this->authorize('update', $project);
        if ($project->client_id != $client->id) {
            abort(404);
        }
        return view('projects.edit', compact('client', 'project'));
    }

    public function update(UpdateProjectRequest $request, Client $client, Project $project)
    {
        $this->authorize('update', $project);
        if ($project->client_id != $client->id) {
            abort(404);
        }
        $project->update($request->validated());
        return redirect()->route('clients.projects.index', $client)->with('success', 'Project updated successfully');
    }

    public function destroy(Client $client, Project $project)
    {
        $this->authorize('delete', $project);
        if ($project->client_id != $client->id) {
            abort(404);
        }
        $project->delete();
        return redirect()->route('clients.projects.index', [$project->client])->with('success', 'Project deleted successfully');
    }
}
