<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [ "name", "admin_id" ,"email", "password"];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }
}
