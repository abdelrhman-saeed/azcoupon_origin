<?php

namespace App\Http\Controllers;

use App\Exports\SubscribersExport;
use App\Models\SubscriberUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubscriberUserController extends Controller
{
    public function store(Request $request)
    {
        if ( ! $request->ajax()) return response('unauthorized', 401);

        Log::info('', $request->only('nickname', 'phone'));
        $request->validate([ 'nickname' => 'required',  'phone' => 'required']);

        SubscriberUser::create($request->only('nickname', 'phone'));
    }

    public function exportUserAsXlsx(): BinaryFileResponse
    {
        return Excel::download(new SubscribersExport(), 'users.xlsx');
    }
}
