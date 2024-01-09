@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Screening Data</h1>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Date of Birth</th>
                <th>Headache Frequency</th>
                <th>Daily Headache Frequency</th>
                <th>Eligibility</th>

            </tr>
            </thead>
            <tbody>
            @foreach($screenings as $screening)
                <tr>
                    <td>{{ $screening->id }}</td>
                    <td>{{ $screening->first_name }}</td>
                    <td>{{ $screening->date_of_birth }}</td>
                    <td>{{ $screening->headache_frequency }}</td>
                    <td>{{ $screening->daily_headache_frequency }}</td>
                    <td>{{ $screening->eligibility }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $screenings->links('pagination::bootstrap-4') }}
    </div>
@endsection
