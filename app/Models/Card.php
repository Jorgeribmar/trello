<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id_card'];

    protected $primaryKey = 'id_card';

    public function column()
    {
        return $this->belongsTo(Column::class);
    }
}
