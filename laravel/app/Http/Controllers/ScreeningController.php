<?php

namespace App\Http\Controllers;

use App\Enums\DailyHeadacheFrequency;
use App\Enums\HeadacheFrequency;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ScreeningController extends Controller
{
    public function index(Request $request)
    {
        $screenings = Subject::latest()->paginate(10); // Adjust the pagination size as needed

        return view('screening.index', compact('screenings'));
    }

    public function showForm()
    {
        return view('screening.form');
    }

    public function processForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'headache_frequency' => [
                'required',
                Rule::in([HeadacheFrequency::Daily, HeadacheFrequency::Weekly, HeadacheFrequency::Monthly]),
            ],
            'daily_headache_frequency' => 'required_if:headache_frequency,'.HeadacheFrequency::Daily
        ]);

        if($validatedData['headache_frequency'] != HeadacheFrequency::Daily) {
            unset($validatedData['daily_headache_frequency']);
        }
        // Create a new subject in the database
        $subject = Subject::create($validatedData);

        // Determine eligibility
        $eligibilityMessage = $this->determineEligibility($subject);

        // Display results
        return view('screening.results', [
            'subject' => $subject,
            'eligibilityMessage' => $eligibilityMessage,
        ]);
    }
    private function determineEligibility($subject)
    {
        if ($subject->date_of_birth > now()->subYears(18)) {
            $subject->eligibility = 'ineligible';
            $eligibilityMessage = 'Participants must be over 18 years of age';

        } elseif ($subject->headache_frequency === 'Daily') {
            $subject->eligibility = 'Cohort B';
            $eligibilityMessage = $subject->first_name . ' is assigned to Cohort B';
        } else {
            $subject->eligibility = 'Cohort A';
            $eligibilityMessage = $subject->first_name . ' is assigned to Cohort A';
        }

        // Update the subject with the eligibility information
        $subject->save();

        return $eligibilityMessage;
    }
}
