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
        $ordersStatus = DB::table('statusOrder')
                        ->where('id', '=', '1')
                        ->orWhere('id', '=', '4')
                        ->get();
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
       
        $statusName = $request->input('statusOrders');
        if ($statusName == 'Принят') {
            $statusId = '1';
        }
        if ($statusName == 'Выполняется') {
            $statusId = '2';
        }
        if ($statusName == 'Готов') {
            $statusId = '3';
        }
        if ($statusName == 'Оплачен') {
            $statusId = '4';
        }

        $order->idStatusOrder = $statusId;
        $order->save();

        if ($statusId == '4' || $statusId == '1') {
            return redirect()->route('order')->with("Статус заказа успешно обновлен");
        } else {
            return redirect()->route('mechanicOrder')->with("Статус заказа успешно обновлен");
        }

        
        //$statusId = DB::table('statusOrder')->where('statusOrderName', '=', '$statusName')->dd();
        /*var_dump($statusName);
        $statusId = DB::table('statusOrder')
                        ->when($statusName, function($query, $statusName) {
                            return $query->where('statusOrderName', $statusName);
                            })
                            ->dd();*/
        //echo($statusId);
        //$order->idStatusOrder = $statusId;
        //$order->save();
        //$order = DB::table('orderTicket')->where('id', $id)->update(['idStatusOrder' => $statusId]);
        /*$order = OrderTicket::find($id);
        $statusName = $request->input('statusOrder');
        $statusId = DB::table('statusOrder')->select('id')->where('statusOrderName', '=', $statusName)->get();
    
        $order->idStatusOrder => $statusId->id;

        $order->save();*/
        //$status = DB::table('statusOrder')->where('id', '=', '$id')->get();

    } 


    public function newOrder(OrderRequest $request) {
        $idClient = $request->input('clientOrder');
        $orderTicket = DB::table('orderTicket')->insert([
            'idWorkShift' => '1',
            'idClient' => $idClient,
            'idStatusOrder' => '1',
        ])->dd();
        $orderPoint = DB::table('orderPoint')->insert([

        ]);
        
       

    }
}
