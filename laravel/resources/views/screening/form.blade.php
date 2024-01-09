@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('screening.process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label for="headache_frequency">Headache Frequency:</label>
            <select class="form-control" name="headache_frequency" id="headache_frequency" required>
                @foreach (\App\Enums\HeadacheFrequency::getValues() as $frequency)
                    <option value="{{ $frequency }}">{{ $frequency }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="dailyFrequency" style="display: none;">
            <label for="daily_headache_frequency">Daily Headache Frequency:</label>
            <select class="form-control" name="daily_headache_frequency">
                <option value="">Select frequency</option>
                @foreach (\App\Enums\DailyHeadacheFrequency::getValues() as $frequency)
                    <option value="{{ $frequency }}">{{ $frequency }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        // Show/hide daily frequency based on the selected headache frequency
        $(document).ready(function() {
            $('#headache_frequency').change(function() {
                if ($(this).val() === 'Daily') {
                    $('#dailyFrequency').show();
                } else {
                    $('#dailyFrequency').hide();
                }
            });
        });
    </script>
@endsection
