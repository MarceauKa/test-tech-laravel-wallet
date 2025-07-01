<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\PerformWalletTransfer;
use App\Http\Requests\Api\V1\SendMoneyRequest;
use Illuminate\Http\Response;

class RecurringTransferController
{
    public function create(SendMoneyRequest $request, PerformWalletTransfer $performWalletTransfer): Response
    {
        $recipient = $request->getRecipient();

        $performWalletTransfer->execute(
            sender: $request->user(),
            recipient: $recipient,
            amount: $request->input('amount'),
            reason: $request->input('reason'),
        );

        return response()->noContent(201);
    }

    public function delete(PerformWalletTransfer $performWalletTransfer): Response
    {
        $recipient = $request->getRecipient();

        $performWalletTransfer->execute(
            sender: $request->user(),
            recipient: $recipient,
            amount: $request->input('amount'),
            reason: $request->input('reason'),
        );

        return response()->noContent(201);
    }
}
