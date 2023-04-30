<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationHistory extends Model
{
    use HasFactory;

    protected $fillable = [ "action", "invitation_id"];

    public function invitations():BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }
}
