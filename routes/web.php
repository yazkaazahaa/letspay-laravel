<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Models\Payment;
use App\Models\Student;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::resource('students', StudentController::class);
Route::resource('payments', PaymentController::class);

Route::get('/dashboard', function () {

    $totalStudents = Student::count();

    $bulanIni = date('F');
    $tahunIni = date('Y');

    $lunas = Payment::where('bulan', $bulanIni)
        ->where('tahun', $tahunIni)
        ->where('status', 'Lunas')
        ->count();

    $belum = Payment::where('bulan', $bulanIni)
        ->where('tahun', $tahunIni)
        ->where('status', 'Belum Lunas')
        ->count();

    return view('dashboard', compact(
        'totalStudents',
        'lunas',
        'belum',
        'bulanIni',
        'tahunIni'
    ));
});