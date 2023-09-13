<?php

namespace App\Observers;

use App\Models\Barang;
use App\Models\log_activity;

class BarangObserver
{
    private const LOGGER = log_activity::class;
    private const MODEL = Barang::class;

    /**
     * Handle the Barang "created" event.
     */
    public function created(Barang $barang): void
    {
        log_activity::query()->create([
            'on_table' => 'Barang',
            'action' => 'insert',
            'affected_by' => request()->user()['id_akun']
        ]);
    }

    /**
     * Handle the Barang "updated" event.
     */
    public function updating(Barang $barang): void
    {
        log_activity::query()->create([
            'on_table' => 'Barang',
            'action' => 'update',
            'affected_by' => request()->user()['id_akun']
        ]);
    }

    /**
     * Handle the Barang "deleted" event.
     */
    public function deleted(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "restored" event.
     */
    public function restored(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "force deleted" event.
     */
    public function forceDeleted(Barang $barang): void
    {
        //
    }
}