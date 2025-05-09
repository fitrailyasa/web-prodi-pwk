<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class UpdateEventStatus extends Command
{
    protected $signature = 'event:update-status';
    protected $description = 'Update status event';

    public function handle()
    {
        $now = Carbon::now();

        $events = Event::where('status', '!=', 'publish')
            ->whereDate('publish_date', '<=', $now)
            ->get();

        foreach ($events as $event) {
            $event->status = 'publish';
            $event->save();
        }

        $this->info('Event berhasil diupdate.');
    }
}
