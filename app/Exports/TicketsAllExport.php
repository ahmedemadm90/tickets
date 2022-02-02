<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicketsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $tickets = Ticket::all();
        return $tickets;
    }
    public function map($open_tickets): array
    {
        return [
            $open_tickets->id,
            $open_tickets->camera($open_tickets->camera_id)->code,
            $open_tickets->camera($open_tickets->camera_id)->en_name,
            $open_tickets->camera($open_tickets->camera_id)->ar_name,
            $open_tickets->details,
            $open_tickets->state,
            $open_tickets->created_at,
            "http://127.0.0.1:8000/tickets/show/$open_tickets->id"
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Camera Code',
            'Camera En Name',
            'Camera Ar Name',
            'Details',
            'State',
            'Issue Date',
            'Show',
        ];
    }
}
