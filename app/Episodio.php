<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $perPage = 10;
    protected $appends = ['links'];

    public function Serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($value): bool
    {
        return $value;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/' . $this->id,
            'serie' => '/api/series/' . $this->serie_id
        ];
    }

}
