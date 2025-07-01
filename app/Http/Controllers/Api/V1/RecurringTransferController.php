<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\PerformWalletTransfer;
use App\Http\Requests\Api\V1\SendMoneyRequest;
use App\Http\Requests\SendRecurringMoney;
use App\Models\RecurringTransfer;
use Illuminate\Http\Response;

class RecurringTransferController
{
    public function index(): Response
    {
        $recurringTransfers = auth()->user()->recurringTransfers()
            ->get();

        // @todo Use a resource collection to format the response
        return response()->json($recurringTransfers, 200);
    }

    public function create(SendRecurringMoney $request): Response
    {
        //

        return response()->noContent(201);
    }

    public function delete(RecurringTransfer $transfer): Response
    {
        //

        return response()->noContent(201);
    }
}
