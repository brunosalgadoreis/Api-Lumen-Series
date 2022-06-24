<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends BaseController
{
  public function __construct()
  {
    $this->classes = Serie::class;
  }

  public function buscaPorSerie(int $serieId)
  {
    $episodios = Episodio::query()->where('serie_id', $serieId)->paginate();
    return $episodios;
  }
}
