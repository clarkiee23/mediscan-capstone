<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\Task;
use App\Models\Position;

use App\Models\Department;
use App\Models\Sex;
use App\Models\Yearlevel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    public function getTransaction() {
       $users = Users::all();

        return view('pages.admin.transaction', compact(
            'users',
        ));
    }


    public function getReports() {
        $users = Users::all();
        $department = Department::all();
        $transaction = Transaction::all();

        return view('pages.admin.reports', compact(
            'users',
            'department',
            'transaction'
        ));
    }

    public function download() {
        // $users = Users::all();
        // $department = Department::all();
        // $transaction = Transaction::all();

        // return view('pages.admin.download', compact(
        //     'users',
        //     'department',
        //     'transaction'
        // ));

        return view('pages.admin.download');

        // $pdf = Pdf::loadView('pages.admin.download');

        // return $pdf->stream('homepage.pdf');
    }

}
