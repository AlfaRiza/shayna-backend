<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending'   => Transaction::where('transaction_status', 'PENDING')->get(),
            'failed'   => Transaction::where('transaction_status', 'FAILED')->get(),
            'success'   => Transaction::where('transaction_status', 'SUCCESS')->get(),
        ];
        return view('pages.dashboard', compact('income', 'sales', 'items', 'pie'));
    }
}
