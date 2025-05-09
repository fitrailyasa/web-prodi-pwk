<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Berita;
use Carbon\Carbon;

class UpdateBeritaStatus extends Command
{
    protected $signature = 'berita:update-status';
    protected $description = 'Update status berita';

    public function handle()
    {
        $now = Carbon::now();

        $beritas = Berita::where('status', '!=', 'publish')
            ->whereDate('publish_date', '<=', $now)
            ->get();

        foreach ($beritas as $berita) {
            $berita->status = 'publish';
            $berita->save();
        }

        $this->info('Berita berhasil diupdate.');
    }
}
