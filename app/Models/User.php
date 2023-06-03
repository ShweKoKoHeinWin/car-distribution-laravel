<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasRoles;

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
        'password' => 'hashed',
    ];


    public function scopeFilter($query, array $filters)
    {
        if ($filters['members'] ?? false) {
            $query->where(function ($query) {
                $query->whereHas('roles', function ($relationQuery) {
                    $relationQuery->where('name', 'LIKE', '%member%');
                });
            });
        }

        if ($filters['staffs'] ?? false) {
            $query->where(function ($query) {
                $query->whereHas('roles', function ($relationQuery) {
                    $relationQuery->where('name', 'NOT LIKE', '%member%');
                });
            });
        }

        if ($filters['roles'] ?? false) {
            $searchTerm = $filters['roles'];

            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('roles', function ($relationQuery) use ($searchTerm) {
                    $relationQuery->where('name', 'LIKE', '%' . $searchTerm . '%');
                });
            });
        }

        if ($filters['search'] ?? false) {
            $searchTerm = $filters['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('roles', function ($relationQuery) use ($searchTerm) {
                    $relationQuery->where('name', 'LIKE', '%' . $searchTerm . '%');
                })->orWhere('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
            });
        }
    }
}
