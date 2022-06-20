<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    public function index(): View
    {
        $this->authorize('view', Client::class);
        $clients = Client::withCount('projects')->get();
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
}
