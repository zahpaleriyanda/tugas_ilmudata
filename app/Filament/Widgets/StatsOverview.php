<?php

namespace App\Filament\Widgets;

use App\Models\Mahasiswa;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class StatsOverview extends StatsOverviewWidget
{

    protected function getStats(): array
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalDosen = User::role('dosen')->count();

        // Ganti nama model dan kolom sesuai database lu jika berbeda.
        $sesiHariIni = \App\Models\SesiAbsensi::whereDate('created_at', today())->count();

        $kehadiranHariIni = \App\Models\Absensi::whereDate('created_at', today())->count();

        return [
            Stat::make('Total Mahasiswa', number_format($totalMahasiswa))
                ->description('Jumlah mahasiswa')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->chart([3, 5, 4, 7, 6, 8, 10])
                ->color('success')
                ->icon('heroicon-o-user-group'),

            Stat::make('Total Dosen', number_format($totalDosen))
                ->description('Jumlah dosen')
                ->descriptionIcon('heroicon-m-users')
                ->chart([2, 4, 3, 5, 4, 6, 8])
                ->color('danger')
                ->icon('heroicon-o-user'),

            Stat::make('Sesi Absensi Hari Ini', number_format($sesiHariIni))
                ->description('Sesi yang dibuat hari ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart([1, 2, 1, 3, 2, 4, 3])
                ->color('warning')
                ->icon('heroicon-o-calendar-days'),

            Stat::make('Kehadiran Hari Ini', number_format($kehadiranHariIni))
                ->description('Catatan kehadiran hari ini')
                ->descriptionIcon('heroicon-m-check-circle')
                ->chart([4, 6, 5, 8, 7, 9, 10])
                ->color('info')
                ->icon('heroicon-o-clipboard-document-check'),
        ];
    }
}
