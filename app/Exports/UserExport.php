<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;
class UserExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function map($row): array
    {
        return [
            $row->name,
            $row->email
        ];
    
}

public function headings(): array
    {
        return [
            'Name',
            'Email',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'Name' => 20,
            'Email' => 30,
        ];
    }
}