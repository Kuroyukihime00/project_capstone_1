<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index() {
        $ketuaHima = 'John Doe';
        $anggotas = ['Susan', 'Richard'];
        $divisions = ['Kemitraan', 'Akademik'];
        return view('demo/file3', [
            'abc' => $ketuaHima,
            'abc2' => $anggotas,
        ])->with('members', $anggotas)
            ->with('divisions', $divisions);
    }
}
