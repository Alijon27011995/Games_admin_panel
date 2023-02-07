<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Addresse;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductRu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;


class OrderController extends Controller
{
    public function index(){
        // dd('came');

        // $sort_search =null;
        // $brands = Brand::orderBy('name', 'asc');
        // if ($request->has('search')){
        //     $sort_search = $request->search;
        //     $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        // }
        // $brands = $brands->paginate(100);


            // $orders=Order::get();
        // $orders = DB::table('orders')
        //     ->join('users', 'orders.user_id', '=', 'users.id')
        //     ->select('orders.*', 'users.phone_number', 'users.full_name')
        //     ->orderByDesc('created_at')
        //     ->simplePaginate(5);






            $list=[];

            $orders = DB::table('orders')->orderByDesc('created_at')->simplePaginate(5);
            // foreach ($orders as  $order) {

            //     $user=User::where('telegram_id',$order->telegram_id)->first();

            //         $data=[
            //             'id'=>$order->id,
            //             'code'=>$order->code,
            //             'date'=>$order->created_at,
            //             'user_name'=>$user->full_name,
            //             'user_phone'=>$user->phone_number,
            //         ];


            //         array_push($list,$data);
            //     // $count_history +=$history->quantity;

            // }
            // $list=$list->simplePaginate(5);




       return view('admin.tables.basic_table_history', compact('orders'));

    }
    public function orderShow($id){
        // dd('came');


        $order=Order::where('id',$id)->first();
        $user=User::where('telegram_id',$order->telegram_id)->first();
        $order_datails=OrderDetail::where('order_id',$order->id)->get();
        $address=DB::table('addresses')->where('user_id',$user->id)->first();
        // $product=Product::get();
        // dd($product);
        $list=[];
        foreach ($order_datails as $order_datail) {
            $product=ProductRu::where('id',$order_datail->product_id)->first();
            $data=[
                'code'=>$order->code,
                'date'=>$order->created_at,
                'user_name'=>$user->full_name,
                'user_phone'=>$user->phone_number,
                'product_quantity'=>$order_datail->quantity,
                'product_name'=>$product->name ?? 'product not found',
                'product_foto'=>$product->foto ??"not found",
                'adrress'=>$address->address ?? "not fount"
            ];
            array_push($list,$data);
        }


        //    dd($list);
        //    return 'came';
        // return view('admin.forms.basic_elements_update',compact('user'));


       return view('admin.tables.basic_table', compact('list'));

    }

}
