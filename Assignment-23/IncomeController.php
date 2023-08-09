<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
$incomes = auth()->user()->incomes()->paginate(10);


class IncomeController extends Controller
{
public function create()
{
    return view('income.create');
}

public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'amount' => 'required|numeric',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    // Store the record
    $income = new Income($validatedData);
    auth()->user()->incomes()->save($income);

    return redirect()->route('income.index')->with('success', 'Income record added.');
}

public function index(Request $request)
{
    $incomes = auth()->user()->incomes();

    if ($request->has('sort')) {
        if ($request->input('sort') == 'amount') {
            $incomes->orderBy('amount', $request->input('order', 'asc'));
        } elseif ($request->input('sort') == 'date') {
            $incomes->orderBy('date', $request->input('order', 'asc'));
        }
    }

    // Apply filters if any
    // ...

    $incomes = $incomes->paginate(10);

    return view('income.index', compact('incomes'));
}

public function edit(Income $income)
{
    return view('income.edit', compact('income'));
}

public function update(Request $request, Income $income)
{
    $validatedData = $request->validate([
        'amount' => 'required|numeric',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    $income->update($validatedData);

    return redirect()->route('income.index')->with('success', 'Income record updated.');
}

public function destroy(Income $income)
{
    $income->delete();
    return redirect()->route('income.index')->with('success', 'Income record deleted.');
}


}
