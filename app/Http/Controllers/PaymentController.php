<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('F');
        $tahun = $request->tahun ?? date('Y');

        $payments = Payment::with('student')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        $students = Student::all();

        return view('payments.index', compact('payments', 'students', 'bulan', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'status' => 'required'
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index', [
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ])->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $payment->update($request->only('status', 'tanggal_bayar'));

        return back()->with('success', 'Pembayaran diupdate');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return back()->with('success', 'Pembayaran dihapus');
    }
}