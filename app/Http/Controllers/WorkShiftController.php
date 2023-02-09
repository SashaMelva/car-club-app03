<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkerForWorkShift;
use App\Models\WorkShift;
use App\Http\Requests\WorkShiftRequest;
use Illuminate\Support\Facades\DB;


class WorkShiftController extends Controller
{
    public function allData() {
        $workShiftsData = DB::table('workShift')
                            ->join('statusWorkShift', 'workShift.idStatusWorkShift', '=', 'statusWorkShift.id')
                            ->get();
        $workersData = DB::table('workerForWorkShift')
                            ->join('userr', 'workerForWorkShift.idUser', '=', 'userr.id')
                            ->join('roles', 'userr.idRole', '=', 'roles.id')
                            ->get();
        $workShiftsStatus =  DB::table('statusWorkShift')
                            ->get();
        return view('role/admin/workShift', ['workShiftsData' => $workShiftsData, 'workersData' => $workersData, 'workShiftsStatus' => $workShiftsStatus]);
    }

    public function create() {
        $workShiftsStatus =  DB::table('statusWorkShift')
                            ->get();
        $workShiftUsers = DB::table('userr')
                            ->join('roles', 'userr.idRole', '=', 'roles.id')
                            ->get();
        return view('role/admin/newWorkShift', ['workShiftsStatus' => $workShiftsStatus, 'workShiftUsers' => $workShiftUsers]);
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

    public function updateStatus($id, WorkShiftRequest $request ) {
        $workShiftData = WorkShift::find($id);
       
        $statusNameWork = $request->input('workShiftStatusSelect');
      
        if ($statusNameWork == 'Ожидает') {
            $statusIdWork  = '1';
        }
        if ($statusNameWork == 'Окрыто') {
            $statusIdWork  = '2';
        }
        if ($statusNameWork == 'Закрыто') {
            $statusIdWork  = '3';
        }
      
        $workShiftData->idStatusWorkShift = $statusIdWork;
        $workShiftData->save();
        
        return redirect()->route('adminWorkShift')->with("Статус рабочей смены успешно обновлен");
        
    }
}
