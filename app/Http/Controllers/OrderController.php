<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderTicket;
use App\Models\OrderPoint;

class OrderController extends Controller
{
    public function allDataOrder() {
        return view('role/receivers/order', ['ordersData' => OrderTicket::all()], ['ordersDataPoint' => OrderPoint::all()]);
    }

    public function create() {
        return view('role/receivers/newOrder');
    }

    public function deletOrder() {
        OrderTicket::find($id)->delete();
        return view('role/receivers/order', ['ordersData' => OrderTicket::all()], ['ordersDataPoint' => OrderPoint::all()]);
    }
}
