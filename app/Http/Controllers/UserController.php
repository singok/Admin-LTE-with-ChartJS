<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->select('id','created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $labels = [];
        $dataCount = [];
        foreach($users as $label => $data) {
            $labels[] = $label;
            $dataCount[] = count($data);
        }

        return view('dashboard', [
            'labels' => $labels,
            'data' => $dataCount
        ]);
    }
}
