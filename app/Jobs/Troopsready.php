<?php

namespace App\Jobs;
use App\Http\Controllers\ArmyController;
use App\TroopQueue;
use App\TroopUnit;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Troopsready implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $troopUnit;
    protected $troopQueueRow;
    public function __construct(TroopUnit $tu, TroopQueue $tqr)
    {
        $this->troopUnit = $tu;
        $this->troopQueueRow = $tqr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->troopUnit->amount = $this->troopUnit->amount + $this->troopQueueRow->amount;
        $this->troopUnit->save();
        $this->troopQueueRow->delete();
        ArmyController::troopsReady();
      return;
    }
}
