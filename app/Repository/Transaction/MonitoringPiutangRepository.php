<?php

namespace App\Repository\Transaction;

use App\Entity\Transaction\Skrd;
use Carbon\Carbon;

class MonitoringPiutangRepository
{
    /**
     * Get all piutang
     *
     * @return Collection
     */
    public function getPiutang(array $attributes = [])
    {
        $year = date('Y');
        if( isset($attributes['year']))
            $year = $attributes['year'];

        return Skrd::with('objectRetribusi.pemakai', 'tbpDetail')
            ->whereHas('objectRetribusi.pemakai', function ($query) use ($attributes) {
                if( isset($attributes['keyword']))
                    $query->where('nama', 'like', '%' . $attributes['keyword'] . '%');
            })
            ->whereDoesntHave('tbpDetail')
            ->when($year, function($query) use ($year) {
                $date = Carbon::createFromDate($year, 01, 01);
                $startOfYear = $date->copy()->startOfYear();
                $endOfYear = $date->copy()->endOfYear();

                $query->whereBetween('tanggal', [$startOfYear, $endOfYear]);
            })
            ->get();
    }

    /**
     * Get all piutang with pagiate
     *
     * @return Collection
     */
    public function getPiutangPaginate(array $attributes = [])
    {
        $year = date('Y');
        if( isset($attributes['year']))
            $year = $attributes['year'];

        return Skrd::with('objectRetribusi.pemakai', 'tbpDetail')
            ->whereHas('objectRetribusi.pemakai', function ($query) use ($attributes) {
                if( isset($attributes['keyword']))
                    $query->where('nama', 'like', '%' . $attributes['keyword'] . '%');
            })
            ->whereDoesntHave('tbpDetail')
            ->when($year, function($query) use ($year) {
                $date = Carbon::createFromDate($year, 01, 01);
                $startOfYear = $date->copy()->startOfYear();
                $endOfYear = $date->copy()->endOfYear();

                $query->whereBetween('tanggal', [$startOfYear, $endOfYear]);
            })
            ->paginate(10);
    }
}