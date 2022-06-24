<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->get('archive')) {
            $clients = Client::withCount('projects')->onlyTrashed()->get();
        } else {
            $clients = Client::withCount('projects')->get();
        }

        $this->authorize('view', Client::class);
        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        $this->authorize('create', Client::class);
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        $this->authorize('create', Client::class);

        $client = Client::create($request->validated() + ['user_id' => auth()->id()]);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $client->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function edit(Client $client): View
    {
        $this->authorize('update', $client);
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $this->authorize('update', $client);
        $client->update($request->validated());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $this->authorize('delete', $client);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }

    public function restore($id): RedirectResponse
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();
        return redirect()->route('clients.index', ['archive' => 1])->with('success', 'Client restored successfully');
    }

    public function forceDelete($id): RedirectResponse
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();
        return redirect()->route('clients.index', ['archive' => 1])->with('success', 'Client deleted successfully');
    }
}
