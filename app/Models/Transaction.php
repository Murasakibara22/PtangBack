<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_transaction',
        'code_IBAN',
        'montant',
        'description',
        'ref',
        'numero_compte',
        'nom_banque',
        'slug',
        'user_id',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class , 'user_id');
    }
}
