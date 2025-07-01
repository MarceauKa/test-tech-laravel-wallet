<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\PerformWalletTransfer;
use App\Http\Requests\Api\V1\SendMoneyRequest;
use App\Http\Requests\CreateRecurringTransferRequest;
use App\Models\RecurringTransfer;
use Illuminate\Http\Response;

class RecurringTransferController
{
    public function create(CreateRecurringTransferRequest $request): Response
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
