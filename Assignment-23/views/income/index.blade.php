@extends('layouts.app')  <!-- Assuming you have a layout named 'app.blade.php' -->

@section('content')
    <h1>Income Records</h1>
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
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->date }}</td>
                    <td>{{ $income->description }}</td>
                    <td>{{ $income->amount }}</td>
                    <td>{{ $income->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $incomes->links() }} <!-- Pagination links -->
@endsection
