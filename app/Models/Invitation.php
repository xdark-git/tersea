<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [ 'link_code', 'admin_id', 'employee_id', 'status_id'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function statuses(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(InvitationHistory::class, 'invitation_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        

        static::created(function ($invitation) {
            $action = "Envoi d’invitation" ;

            $history = new InvitationHistory();
            $history->invitation_id = $invitation->id;
            $history->action = $action;
            $history->save();
        });

        static::updated(function ($invitation) {
            $status = $invitation->statuses->name;
            $action =  ($status === "En attente") ? "Envoi d’invitation" : (($status === "Valider") ? "Validation d’invitation" : "Annulation d’invitation");

            $history = new InvitationHistory();
            $history->invitation_id = $invitation->id;
            $history->action = $action;
            $history->save();
        });
    }
}
