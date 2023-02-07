<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkerForWorkShift;
use App\Models\WorkShift;
use Illuminate\Support\Facades\DB;

class WorkShiftController extends Controller
{
    public function allData() {
        $workShiftsData = DB::table('workShift')
                            ->join('statusWorkShift', 'workShift.idStatusWorkShift', '=', 'statusWorkShift.id')
                            ->get();
        $workersData = DB::table('workerForWorkShift')
                            ->join('userr', 'workerForWorkShift.idUser', '=', 'userr.id')
                            ->get();
        $workShiftsStatus =  DB::table('statusWorkShift')
                            ->get();
        return view('role/admin/workShift', ['workShiftsData' => $workShiftsData, 'workersData' => $workersData, 'workShiftsStatus' => $workShiftsStatus]);
    }

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

    

    public function deletWorkShift() {

    }
}
