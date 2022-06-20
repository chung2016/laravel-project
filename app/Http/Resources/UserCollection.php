<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    public function toArray($request)
    {
        $role = $this->roles->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $role ? $role->name : null,
            'clients' => $this->clients_count,
        ];
    }
}
