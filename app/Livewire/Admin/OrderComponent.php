<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class OrderComponent extends Component
{
    //View variables
    public $givenOrders = [], $inProgressOrders = [], $doneOrders = [], $cateredOrders = [];

    public function mount()
    {
        $this->allOrders();
    }

    public function allOrders()
    {
        $this->givenOrders = Order::orderBy('id', 'desc')->get();
        $this->inProgressOrders = Order::whereIn('status', [1,2])->orderBy('id', 'desc')->get();
        $this->doneOrders = Order::where('status', 3)->orderBy('id', 'desc')->get();
        $this->cateredOrders = Order::where('status', 4)->orderBy('id', 'desc')->get();
    }

    public function changeStatus(Order $order, OrderItem $orderItem, $status)
    {
        $orderItem->update(['status' => '3']);
        $count = $order->orderItems()->count();
        $doneCount = $order->orderItems()->where('status', '3')->count();
        if ($count == $doneCount) {
            $order->update(['status' => 3]);
        } else {
            $order->update(['status' => '2']);
        }
        $this->allOrders();
    }

    public function orderReady(Order $order)
    {
        $order->update(['status' => 3]);
        $order->orderItems()->update(['status' => 3]);
        $this->allOrders();
    }

    public function render()
    {
        return view('livewire.admin.order-component');
    }

    public function cater(Order $order)
    {
        $order->update(['status' => 4]);
        $this->allOrders();
    }
}
