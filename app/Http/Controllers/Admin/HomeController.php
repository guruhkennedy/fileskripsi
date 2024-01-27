<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function changeKeyToMonth($key)
    {
        if ($key == 0) {
            return 'Januari';
        } elseif ($key == 1) {
            return 'Februari';
        } elseif ($key == 2) {
            return 'Maret';
        } elseif ($key == 3) {
            return 'April';
        } elseif ($key == 4) {
            return 'Mei';
        } elseif ($key == 5) {
            return 'Juni';
        } elseif ($key == 6) {
            return 'Juli';
        } elseif ($key == 7) {
            return 'Agustus';
        } elseif ($key == 8) {
            return 'September';
        } elseif ($key == 9) {
            return 'Oktober';
        } elseif ($key == 10) {
            return 'November';
        } elseif ($key == 11) {
            return 'Desember';
        }
    }

    public function index()
    {
        $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $month = collect($month);
        $grafik_bulan = Reservasi::selectRaw('MONTH(created_at) as bulan, SUM(total) as jumlah')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('bulan')
            ->get();

        $grafik_bulan = $grafik_bulan->map(function ($item) use ($month) {
            $item->bulan = $month[$item->bulan - 1];
            return $item;
        });

        $grafik_bulan = $grafik_bulan->pluck('jumlah', 'bulan');

        $grafik_bulan = $month->map(function ($item) use ($grafik_bulan) {
            if ($grafik_bulan->has($item)) {
                return $grafik_bulan[$item];
            } else {
                return 0;
            }
        });

        $grafik_bulan = $grafik_bulan->keyBy(function ($item, $key) {
            return $this->changeKeyToMonth($key);
        });

        $labels = $grafik_bulan->keys();
        $data = $grafik_bulan->values();

        $grafik_bulan_total = Reservasi::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('bulan')
            ->get();

        $grafik_bulan_total = $grafik_bulan_total->map(function ($item) use ($month) {
            $item->bulan = $month[$item->bulan - 1];
            return $item;
        });

        $grafik_bulan_total = $grafik_bulan_total->pluck('jumlah', 'bulan');

        $grafik_bulan_total = $month->map(function ($item) use ($grafik_bulan_total) {
            if ($grafik_bulan_total->has($item)) {
                return $grafik_bulan_total[$item];
            } else {
                return 0;
            }
        });

        $grafik_bulan_total = $grafik_bulan_total->keyBy(function ($item, $key) {
            return $this->changeKeyToMonth($key);
        });

        $labels2 = $grafik_bulan_total->keys();
        $data2 = $grafik_bulan_total->values();

        $tasks = Reservasi::where('status', 1)->get();
        return view('admin.home', compact('tasks', 'labels', 'data', 'labels2', 'data2'));
    }
}
