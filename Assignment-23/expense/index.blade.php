@extends('layouts.app')  <!-- Assuming you have a layout named 'app.blade.php' -->

@section('content')
    <h1>Expense Records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $expenses->links() }} <!-- Pagination links -->
@endsection
