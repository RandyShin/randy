<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cdr;
use Illuminate\Support\Facades\Input;
use DB;


class RecordingsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function  getIndex() {

        $datefrom = \Request::get('datefrom');
        $dateto = \Request::get('dateto');
        $src = \Request::get('src');
        $dst = \Request::get('dst');
        $disposition = \Request::get('disposition');

//        $cdrs   = Cdr::orderby('calldate','desc')
//            ->paginate(15);

        $rec70 = "175.117.145.70";






        $qry = DB::table('cdrs');
        if (Input::has('datefrom'))
        {
            $qry->where('calldate', '>=', $datefrom. ' 00:00:00');
        }
        if (Input::has('dateto'))
        {
            $qry->where('calldate', '<=', $dateto. ' 23:59:59');
        }
        if (Input::has('src'))
        {
            $qry->where('src','like', '%' . $src . '%');
        }
        if (Input::has('dst'))
        {
            $qry->where('dst','like', '%' . $dst . '%');
        }
        if (Input::has('disposition'))
        {
            $qry->where('disposition','like', '%' . $disposition . '%');
        }


        $cdrs = $qry
            ->orderBy('calldate', 'DESC')
            ->paginate(10);

        return view('recordings.index')
            ->withRec70($rec70)
            ->withCdrs($cdrs);


//        return view('recordings.index')
//            ->withCdrs($cdrs);
    }

    public function getlisten() {
        return view('recordings.listen');
    }

    public function getmem_list() {


       $rec70 = "175.117.145.70";


        $calldate = \Request::get('calldate');
        $phone_no = \Request::get('phone_no');
        $company = \Request::get('src');

        //$dst = $phone_no;


        $qry = DB::table('cdrs');
        if (Input::has('datefrom'))
        {
            $qry->where('calldate', '>=', $datefrom. ' 00:00:00');
        }
        if (Input::has('phone_no'))
        {
            $qry->where('dst','=', $phone_no);
        }



        $cdrs = $qry
            ->orderBy('calldate', 'DESC')
            ->paginate(10);


        return view('recordings.mem_list')
                ->withCdrs($cdrs)
                ->withRec70($rec70);
    }
}
