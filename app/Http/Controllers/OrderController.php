<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderTicket;
use App\Models\OrderPoint;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function allDataOrder() {
        $ordersData = DB::table('orderTicket')
                        ->join('statusOrder', 'orderTicket.idStatusOrder', '=', 'statusOrder.id')
                        ->join('client', 'orderTicket.idClient', '=', 'client.id')
                        ->join('workShift', 'orderTicket.idWorkShift', '=', 'workShift.id')
                        ->get();
        $ordersPoint = DB::table('orderPoint')
                        ->join('work', 'orderPoint.idWork', '=', 'work.id')
                        ->get();
        $ordersStatus = DB::table('statusOrder')->where('id', '=', '1')->orWhere('id', '=', '4')->get();
        return view('role/receivers/order', ['ordersData' => $ordersData, 'ordersPointData' => $ordersPoint, 'ordersStatus' => $ordersStatus]);
    }



    public function mechanicDataOrder() {
        $ordersData = DB::table('orderTicket')
                        ->join('statusOrder', 'orderTicket.idStatusOrder', '=', 'statusOrder.id')
                        ->join('client', 'orderTicket.idClient', '=', 'client.id')
                        ->join('workShift', 'orderTicket.idWorkShift', '=', 'workShift.id')
                        ->get();
        $ordersPoint = DB::table('orderPoint')
                        ->join('work', 'orderPoint.idWork', '=', 'work.id')
                        ->get();
        $ordersStatus = DB::table('statusOrder')
                        ->where('id', '=', '2')
                        ->orWhere('id', '=', '3')
                        ->get();
        return view('role/mechanic/order', ['ordersData' => $ordersData, 'ordersPointData' => $ordersPoint, 'ordersStatus' => $ordersStatus]);
    }

    public function adminDataOrder() {
        $ordersData = DB::table('orderTicket')
                        ->join('statusOrder', 'orderTicket.idStatusOrder', '=', 'statusOrder.id')
                        ->join('client', 'orderTicket.idClient', '=', 'client.id')
                        ->join('workShift', 'orderTicket.idWorkShift', '=', 'workShift.id')
                        ->get();
        $ordersPoint = DB::table('orderPoint')
                        ->join('work', 'orderPoint.idWork', '=', 'work.id')
                        ->get();
        return view('role/admin/order', ['ordersData' => $ordersData, 'ordersPointData' => $ordersPoint]);
    } 

   

    public function create() {
        $ordersData = DB::table('orderTicket')->get();
        $ordersPoint = DB::table('orderPoint')->get();
        $worksData = DB::table('work')->get();
        $clientsData = DB::table('client')->get();
        $userrsData = DB::table('userr')->get();
        return view('role/receivers/newOrder', ['worksData' => $worksData,'clientsData' => $clientsData,'userrsData' => $userrsData, 'ordersData' => $ordersData]);
    }

    public function deletOrder() {
        OrderTicket::find($id)->delete();
        return view('role/receivers/order', ['ordersData' => OrderTicket::all()], ['ordersDataPoint' => OrderPoint::all()]);
    }

    public function updateOrderStatus($id, OrderRequest $request) {
        $order = OrderTicket::find($id);
       // $status = $request->option('statusOrder');
        $order->idStatusOrder = '4';

        $order->save();

        return redirect()->route('order')->with("Данные клиета успешно обновлены");
        //$status = DB::table('statusOrder')->where('id', '=', '$id')->get();

    } 
}
