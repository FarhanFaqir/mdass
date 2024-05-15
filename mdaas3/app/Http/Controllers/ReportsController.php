<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;
use App\Models\Location;
use App\Models\PreviousRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function revenue_report_all()
    {
        $user = Auth::user();
        $loc = Auth::user()->location;
        $loc = explode(",", $loc);

        $locations = Location::where('status', 1);
        if ($user->hasRole('Manager')) {
            $locations->whereIn('name', $loc);
        }

        $locations = $locations->get();

        $result = Revenue::join('benchmarks', 'revenues.bench_mark_id', '=', 'benchmarks.id')
            ->select(
                // DB::raw('count(revenues.bench_mark_id) as count'),
                DB::raw('revenues.clinic_name'),
                DB::raw("SUM(specialist_visits) as sv"),
                DB::raw("SUM(office_visits) as ov"),
                DB::raw("SUM(cash) as cash"),
                DB::raw("SUM(credit) as credit"),
                DB::raw("SUM(cheque) as cheque"),
                DB::raw("SUM(care_credit) as care_credit"),
                DB::raw("SUM(other) as other"),
                'revenues.bench_mark_id',
                'benchmarks.bench_mark',
                'benchmarks.month',
                'benchmarks.year'
            )
            // ->whereMonth('revenues.date', Carbon::now()->month)
            ->groupBy("revenues.bench_mark_id")
            ->groupBy("revenues.clinic_name")
            ->where('revenues.status', 1)
            ->orderBy('revenues.date', 'DESC');

        if ($user->hasRole('Manager')) {
            $result->whereIn('revenues.clinic_name', $loc);
        }

        $result = $result->get();

        foreach ($result as $key => $val) {
            $total = $val->cash + $val->credit + $val->cheque + $val->care_credit + $val->other;
            // return $val->add = $total;
            $val['total_revenue'] = $total;
            // $val['total_revenue'] = number_format($total, 2);
        }

        // return $result;
        return view('admin/reports/revenue_report', compact('result', 'locations'));
    }

    public function revenue_report_get_filter(Request $req)
    {
        $user = Auth::user();
        $loc = Auth::user()->location;
        $loc = explode(",", $loc);

        $locations = Location::where('status', 1);
        if ($user->hasRole('Manager')) {
            $locations->whereIn('name', $loc);
        }

        $locations = $locations->get();
        $result = Revenue::join('benchmarks', 'revenues.bench_mark_id', '=', 'benchmarks.id')
            ->select(
                // DB::raw('count(revenues.bench_mark_id) as count'),
                DB::raw('revenues.clinic_name'),
                DB::raw("SUM(specialist_visits) as sv"),
                DB::raw("SUM(office_visits) as ov"),
                DB::raw("SUM(cash) as cash"),
                DB::raw("SUM(credit) as credit"),
                DB::raw("SUM(cheque) as cheque"),
                DB::raw("SUM(care_credit) as care_credit"),
                DB::raw("SUM(other) as other"),
                'revenues.bench_mark_id',
                'benchmarks.bench_mark',
                'benchmarks.month',
                'benchmarks.year'
            )
            // ->whereMonth('revenues.date', Carbon::now()->month)
            ->groupBy("revenues.bench_mark_id")
            ->groupBy("revenues.clinic_name")
            ->where('revenues.status', 1)
            ->orderBy('revenues.date', 'DESC');

        if ($user->hasRole('Manager')) {
            $result->whereIn('revenues.clinic_name', $loc);
        }

        foreach ($result as $key => $val) {
            $total = $val->cash + $val->credit + $val->cheque + $val->care_credit + $val->other;
            // return $val->add = $total;
            $val['total_revenue'] = $total;
            // $val['total_revenue'] = number_format($total, 2);
        }

        if ($req->from_date) {
            $result->whereBetween('revenues.date', [$req->from_date, $req->to_date]);
        }

        if ($req->location) {
            $result->where('revenues.clinic_name', $req->location);
        }

        if ($req->year) {
            $result->whereYear('revenues.date', $req->year);
        }


        $result = $result->get();


        foreach ($result as $key => $val) {
            $total = $val->cash + $val->credit + $val->cheque + $val->care_credit;
            $val['total_revenue'] = $total;
        }

        // return $result;
        return view('admin/reports/revenue_report', compact('result', 'locations'));
    }

    public function previousCollections(Request $req)
    {
        $user = Auth::user();
        $loc = Auth::user()->location;
        $loc = explode(",", $loc);

        $locations = Location::where('status', 1);
        if ($user->hasRole('Manager')) {
            $locations->whereIn('name', $loc);
        }

        $locations = $locations->get();
        $result = PreviousRecord::select();

        if ($user->hasRole('Manager')) {
            $result->whereIn('clinic_name', $loc);
        }

        $result = $result->get();

        return view('admin.reports.previous_collections_report', compact('result', 'locations'));
    }

    public function previousCollectionsFilter(Request $req){
        $user = Auth::user();
        $loc = Auth::user()->location;
        $loc = explode(",", $loc);

        $locations = Location::where('status', 1);
        if ($user->hasRole('Manager')) {
            $locations->whereIn('name', $loc);
        }

        $locations = $locations->get();
        $result = PreviousRecord::where('status', 1);

        if ($user->hasRole('Manager')) {
            $result->whereIn('clinic_name', $loc);
        }

        if ($req->year) {
            $result->where('year', $req->year);
        }
        if ($req->location) {
            $result->where('clinic_name', $req->location);
        }

        $result = $result->get();

        return view('admin.reports.previous_collections_report', compact('result', 'locations'));
    }
}
