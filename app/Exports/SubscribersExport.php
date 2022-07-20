<?php

namespace App\Exports;

use App\Models\SubscriberUser;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscribersExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return SubscriberUser::all('id', 'nickname', 'phone');
    }
}
