<?php

namespace App\Imports;

use App\OrdenMerito;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class OMImport implements ToModel,/* WithBatchInserts, WithChunkReading,*/ WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new OrdenMerito([
            'region' => $row[0],
            'nivel' => $row[1],
            'apellido' => $row[2],
            'nombre' => $row[3],
            'cuil' => $row[4],
            'sexo' => $row[5],
            'localidad' => $row[6],
            'cargo' => $row[7],
            'titulo_1' => $row[8],
            'titulo_2' => $row[9],
            'incumbencia' => $row[10],
        ]);
    }
    /*
    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
    */
    public function rules(): array
    {
        return [
            '0' => ['required','numeric', 'max:11'],
            '1' => ['required','string', 'max:50'],
            '2' => ['required','string', 'max:50'],
            '3' => ['required','string', 'max:50'],
            '4' => ['required','numeric', 'max:11'],
            '5' => ['required','string', 'max:50'],
            '6' => ['required','string', 'max:50'],
            '7' => ['required','string', 'max:100'],
            '8' => ['required','string', 'max:100'],
            '9' => ['string', 'max:100'],
            '10' => ['required','string', 'max:255'],
        ];
    }

}
