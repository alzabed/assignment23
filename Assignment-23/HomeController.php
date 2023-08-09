<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index(Request $request)
{
    $incomes = auth()->user()->incomes();

    if ($request->has('category')) {
        $incomes->where('category', $request->input('category'));
    }

    if ($request->has('start_date') && $request->has('end_date')) {
        $incomes->whereBetween('date', [$request->input('start_date'), $request->input('end_date')]);
    }

    $incomes = $incomes->paginate(10);

    return view('income.index', compact('incomes'));
}

}
