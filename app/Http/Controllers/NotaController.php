<?php

namespace App\Http\Controllers;
use OpenApi\Annotations as OA;


use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/notes",
     *     summary="Get list of notes",
     *     tags={"Notas"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        //
        return response()->json(Nota::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/notas",
     *     summary="Crear una nueva nota",
     *     tags={"Notas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"titulo","contenido"},
     *             @OA\Property(property="titulo", type="string", example="Mi nota"),
     *             @OA\Property(property="contenido", type="string", example="Este es el contenido")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Nota creada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error de validación"
     *     )
     * )
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $nota = Nota::create($validated);
        return response()->json($nota, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
