<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\Country;
use App\Models\Program;


class ReportController extends Controller
{
    public function trainers()
    {
        $trainers = Trainer::all();
        return view("dashboard.reports.trainers_report")->with('trainers', $trainers);
    }

    public function students()
    {
        $students = Student::all();
        return view("dashboard.reports.students_report")->with('students', $students);
    }

    public function countries()
    {
        $countries = Country::all();
        return view("dashboard.reports.countries_report")->with('countries', $countries);
    }

    public function programs()
    {
        $programs = Program::all();
        return view("dashboard.reports.programs_report")->with('programs', $programs);
    }
}
