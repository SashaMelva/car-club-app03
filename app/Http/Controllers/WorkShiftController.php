<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\WorkShift;

class WorkShiftController extends Controller
{
    public function create() {
        return view('role/admin/newWorkShift');
    }

    public function store() {
        $workShift = new WorkShift();

        /*$workShift->start_time
        $workShift->end_time
        $workShift->status
        $workShift->
        $workShift->
        $workShift->
        $workShift->*/

        $workShift->save();

        return redirect()->route('adminWorkShift')->with('Рабочая смена успешно создана');
    }

    public function allData() {
        return view('role/admin/workShift');
    }

    public function deletWorkShift() {

    }
}
