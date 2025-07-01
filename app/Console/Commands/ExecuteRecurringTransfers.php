<?php

namespace App\Console\Commands;

use App\Models\RecurringTransfer;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class ExecuteRecurringTransfers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurring-transfers:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute recurring transfers for users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recurringTransfers = \App\Models\RecurringTransfer::query()->isActive()->chunk(5, function (Collection $models) {
            $models->each($this->executeTransfer(...));
        });
    }

    protected function executeTransfer(RecurringTransfer $transfer)
    {
        $this->comment('Executing transfer for: ' . $transfer->recipient_email);
    }
}
