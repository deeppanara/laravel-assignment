@extends('layouts.app')

@section('content')
    <div class="alert alert-success">
        <p>{{ $eligibilityMessage }}</p>
    </div>

    @if ($subject)
        <h4>Entered Screening Data:</h4>
        <ul class="list-group">
            <li class="list-group-item">First Name: {{ $subject->first_name }}</li>
            <li class="list-group-item">Date of Birth: {{ $subject->date_of_birth }}</li>
            <li class="list-group-item">Headache Frequency: {{ $subject->headache_frequency }}</li>
            @if ($subject->headache_frequency === 'Daily')
                <li class="list-group-item">Daily Headache Frequency: {{ $subject->daily_headache_frequency }}</li>
            @endif
        </ul>
    @endif
@endsection
