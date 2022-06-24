<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{

  protected $classes;

  public function index(Request $request)
  {
    return $this->classes::paginate($request->per_page);
  }

  public function store(Request $request)
  {
    return response()->json($this->classes::create($request->all()), 201);
  }

  public function show(int $id)
  {
    $recurso = $this->classes::find($id);
    if (is_null($recurso)) {
      return response()->json('', 204);
    }

    return response()->json($recurso, 201);
  }

  public function update(int $id, Request $request)
  {
    $recurso = $this->classes::find($id);
    if (is_null($recurso)) {
      return response()->json(['erro' => 'Nao Encontrado'], 404);
    }

    $recurso->fill($request->all());
    $recurso->save();

    return $recurso;
  }

  public function destroy(int $id)
  {
    $recursosRemovidos = $this->classes::destroy($id);
    if ($recursosRemovidos === 0) {
      return response()->json([
        'erro' => 'Recurso nao encontrado'
      ], 404);
    }

    return response()->json('', 201);
  }
}
