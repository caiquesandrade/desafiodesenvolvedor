<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CostumerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                 => $this->id,
            'nome'               => $this->nome,
            'data_de_nascimento' => implode('/', array_reverse(explode('-', $this->data_de_nascimento))),
            'sexo'               => $this->sexo,
            'criado_em'          => $this->created_at->format('d/m/Y'),
            'atualizado_em'      => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
