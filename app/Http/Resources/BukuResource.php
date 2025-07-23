<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    public $status;
    public $message;
    public $resource;

    public function __construct($status, $message, $resource)
    {
        Parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->resource instanceof Collection) {
            return [
                'status' => $this->status,
                'message' => $this->message,
                'data' => $this->resource->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'judul' => $item->judul,
                        'pengarang' => $item->pengarang,
                        'tahun_terbit' => $item->tahun_terbit,
                        'kategori' => $item->kategori->nama_kategori ?? null,
                        'penerbit' => $item->penerbit->nama_penerbit ?? null
                    ];
                })
            ];
        }


        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => [
                'id' => $this->id,
                'judul' => $this->judul,
                'pengarang' => $this->pengarang,
                'tahun_terbit' => $this->tahun_terbit,
                'kategori' => $this->kategori->nama_kategori ?? null,
                'penerbit' => $this->penerbit->nama_penerbit ?? null
            ],
        ];
    }
}
