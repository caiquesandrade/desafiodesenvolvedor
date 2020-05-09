<?php

namespace App\Http\Controllers;

use App\Costumer;
use App\Http\Requests\CostumerRequest;
use App\Http\Resources\CostumerResource;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        try {
            $costumers = Costumer::all();

            $costumers = CostumerResource::collection($costumers);

             return response()->json(
                 [
                    'data' => $costumers,
                    'code' => Response::HTTP_OK
                ]);

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CostumerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request)
    {
        try {
            $validated = $request->validated();
            $costumer = new Costumer();
            $dataNascimento = implode('-', array_reverse(explode('/', $validated['data_de_nascimento'])));
            $costumer->fill([
                'nome'               => $validated['nome'],
                'data_de_nascimento' => $dataNascimento,
                'sexo'               => $validated['sexo']
            ]);
            $costumer->save();

            return response()->json([
                'data' => CostumerResource::make($costumer),
                'code' => Response::HTTP_CREATED
            ]);

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        try {

            return response()->json([
                'data' => $costumer,
                'code' => Response::HTTP_OK
            ]);

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CostumerRequest  $request
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerRequest $request, Costumer $costumer)
    {
        try {
            $validated = $request->validated();
            $dataNascimento = implode('-', array_reverse(explode('/', $validated['data_de_nascimento'])));
            $costumer->fill([
                'nome'               => $validated['nome'],
                'data_de_nascimento' => $dataNascimento,
                'sexo'               => $validated['sexo']
            ]);
            $costumer->save();
            return response()->json([
                'data' => CostumerResource::make($costumer),
                'code' => Response::HTTP_OK
            ]);

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        try {

            $costumer->delete();

            return response()->json([
                'code' => Response::HTTP_NO_CONTENT
            ]);

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }
}
