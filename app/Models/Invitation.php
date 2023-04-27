<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function statuses(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function histories(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

}
