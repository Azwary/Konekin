<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
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
        'image_profile',
        'role',
        'KEY',
        'Birthdate',
        'password',
        'avatar'
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
    public function isMember()
    {
        return $this->role === 'member';
    }

    public function isAdminGrup()
    {
        return $this->role === 'admin_group';
    }

    public function isSuperuser()
    {
        return $this->role === 'superuser';
    }



    public function communities()
    {
        return $this->hasMany(Community::class, 'owner_email', 'email');
    }

    public function adminCommunities()
    {
        return $this->hasMany(AdminCommunity::class, 'email', 'email');
    }
    // public function join()
    // {
    //     return $this->hasOne(joins::class, 'KEY'); // 'user_id' should be replaced with the actual foreign key column name
    // }
    public function joints()
    {
        return $this->hasMany(joins::class, 'KEY', 'KEY'); // Assuming 'KEY' is the foreign key in the 'joint' table
    }
    public function komunitas()
    {
        return $this->belongsTo(Community::class, 'id_komunitas', 'id_komunitas');
    }

    // public function isMember()
    // {
    //     return $this->role === 'member';
    // }

    // public function isAdminGrup()
    // {
    //     return $this->role === 'admin_grup';
    // }

    // public function isSuperuser()
    // {
    //     return $this->role === 'superuser';
    // }



}
