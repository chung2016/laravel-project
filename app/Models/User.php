<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the clients for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Client>
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * Get the projects for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Project>
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the tasks for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Task>
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
