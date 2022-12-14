<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use App\Exports\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;



class ReportController extends Controller
{
    public function index(Request $request)
    {
        // $data['page_title'] = 'Report List';
        // $data['absen'] = Absen::get();

        // return view('backend.report.index', $data);
        // dd($request->all());
        $data['page_title'] = 'Report';
        if ($request->start_date) {
            $date_from_raw = date('Y-m-d', strtotime($request->start_date));
            $date_from = $date_from_raw;
            $date_to_raw = date('Y-m-t', strtotime($request->start_date));
            $date_to = $date_to_raw;
            $absen = Absen::whereBetween('date', [$date_from, $date_to])->orderBy('id','asc')->get();
        }else{
            $now = date('Y-m');
            $date_from_raw = date('Y-m-d', strtotime($now));
            $date_from = $date_from_raw;
            $date_to_raw = date('Y-m-t', strtotime($now));
            $date_to = $date_to_raw;
            $absen = Absen::whereBetween('date', [$date_from, $date_to])->orderBy('id','asc')->get();
        }
        $data['absen'] = $absen;
        if ($request->pdf) {
            $pdf = Pdf::loadView('backend.report.pdf', $data);
            return $pdf->download('invoice.pdf');
        } else {
            return view('backend.report.index', $data);
        }

        

        
    }

    // public function ReportExport() {  
    //     $data['absen'] = Absen::get();  
        
    // }
}
