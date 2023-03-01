<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\CategoryRu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductRu;
use App\Models\ProductUz;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Laravel\Facades\Telegram;
// use File;
use Symfony\Component\HttpFoundation\File;

// namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{


    public function login_blade()
    {
        // return 'ceme';
        return view('admin.samples.login');

    }


    public function dashboard()
    {
        return $this->date_time();

    }



    public function login_form(Request $request)
    {
        if ($request->method() == 'POST')
        {
        // dd($request->all());

            $request->validate([
                'user_name' => 'required|string',
                'password' => 'required|string',
            ]);
                if ($request->user_name=='admin' && $request->password='admin12345') {


                    //    return 'came';
                    // return view('admin.dashboard');
                    return $this->date_time();
                } else {
                    return view('admin.samples.login');
                }

        }
        else
        {
           return view('admin.samples.login');
        }
    }



   public function productTable()
   {


        $products=ProductRu::where('soft_delete',null)->get();
        // dd($product);
        return view('admin.tables.product', compact('products'));
   }

//    public function games_history()
//    {
//             $orders=Order::get();
//             // dd($orders->user);

//            $customers=User::where('status','history')->get();
//            return view('admin.tables.basic_table_history', compact('customers'));
//    }



   public function create(Request $request)
   {

    if ($request->method() == 'POST')
    {
        // dd($request->all());
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $filename = time() . '.'. $request->fotos->extension();
        $path=public_path('uploads/fotos/');
        // dd($path.$filename);
        $request->fotos->move($path, $filename);
        // dd($filename);


       $product=ProductRu::create([
          'product_name_ru'=>$request->name_ru,
          'product_name_uz'=>$request->name_uz,
          'price'=>$request->price,
          'foto'=>$filename,
          'category_id'=>$request->category_id,
          'description_ru'=>$request->description_ru,
          'description_uz'=>$request->description_uz

       ]);
    //    dd($product);
    //    $product=ProductUz::create([
    //     'name'=>$request->name_uz,
    //     'price'=>$request->price,
    //     'foto'=>$filename,
    //     'category_id'=>$request->category_id,
    //     'description'=>$request->description_uz,
    //  ]);
    //    dd($product);
    return redirect()->route("product.tables");
    }
       $categories=CategoryRu::pluck('category_name_ru','id');
    //    dd($categories);
        return view('admin.forms.basic_elements', compact('categories'));

   }





   public function productShow($id)
   {


    $product_ru=ProductRu::where('id',$id)->first();
    // $product_uz=ProductUz::where('id',$id)->first();
    $category=CategoryRu::where('id',$product_ru->category_id)->first();


    //    dd($id);
    //    return 'came';
    return view('admin.forms.product_show',compact('product_ru','category'));
   }




   public function productEdit($id)
   {


    $product_ru=ProductRu::where('id',$id)->first();
    // dd($product_ru);
    // $product_uz=ProductUz::where('id',$id)->first();
    $category=CategoryRu::where('id',$product_ru->category_id)->first();
    $categories=CategoryRu::pluck('category_name_ru','id');



    //    dd($id);
    //    return 'came';
    return view('admin.forms.product_edit',compact('product_ru','category','categories'));
   }





   public function productUpdate(Request $request, CategoryRu $categoryRu)
   {

    //    dd($request->all());

       $filename = time() . '.'. $request->fotos->extension();
        $path=public_path('uploads/fotos/');
        $request->fotos->move($path, $filename);

        $product_ru=ProductRu::where('id',$request->product_id)->first();
        // $product_uz=ProductUz::where('id',$request->product_id)->first();
        if ($product_ru->product_name_ru!=$request->name_ru || $product_ru->product_name_uz!=$request->name_uz ||   $product_ru->price!=$request->price) {
            $product=ProductRu::create([
                'product_name_ru'=>$request->name_ru,
                'product_name_uz'=>$request->name_uz,
                'price'=>$request-> price,
                'parent_id'=>$product_ru->id,
                'foto'=>$filename,
                'category_id'=>$request->category_id,
                'description_ru'=>$request->description_ru,
                'description_uz'=>$request->description_uz

             ]);
             $product_ru->soft_delete='active';

        } else {
            $product_ru->product_name_ru=$request->name_ru;
            $product_ru->product_name_uz=$request->name_uz;
            $product_ru->foto=$filename;
            $product_ru->description_ru=$request->description_ru;
            $product_ru->description_uz=$request->description_uz;
            $product_ru->category_id=$request->category_id;
            $product_ru->price=$request->price;
        }

        $product_ru->save();
        return redirect()->route("product.tables");

   }



   public function productDestroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


    $customer_ru = ProductRu::find($id);

    $customer_ru->soft_delete='active';
    // dd($customer_ru);
    $customer_ru->save();
    return redirect()->route('product.tables');

   }








   public function edit($id)
   {


    $user=User::where('id',$id)->first();
    //    dd($id);
    //    return 'came';
    return view('admin.forms.basic_elements_update',compact('user'));
   }


   public function update(Request $request)
   {

    $user=User::where('id',$request->user_id)->first();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->phone=$request->phone_number;
    $user->players=$request->players;
    $user->games_type=$request->games;
    $user->date=$request->date;
    $user->time=$request->time;
    $user->status="active";
    // dd($user);
    if ($user->save()) {
        return redirect()->route("user.tables");
    }
    //    dd($id);
    //    return 'came';
    return view('admin.forms.basic_elements_update',compact('user'));
   }

   public function destroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


       $customer = User::find($id);
        $customer->delete();
        // echo 'user delite';
        return redirect()->route('user.tables');

   }


   public function user_history_destroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


       $customer = Order::find($id);
        $customer->delete();
        // echo 'user delite';
        return redirect()->route('orders.list');

   }



   public function date_time()
   {
             $date=Carbon::now(new DateTimeZone('Asia/tashkent'));
             $date=$date->format('Y-m-d');

             $orders=DB::table('orders');
            //  dd($orders);

            $order_qunatity = DB::table('orders')
            // ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            // ->select('order_details.quantity')
            ->where('orders.created_at','>',$date)
            ->get();
            //  dd($order_qunatity);

            // $product_qunatity = DB::table('orders')
            // ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            // ->select('order_details.quantity')
            // ->where('orders.created_at','>',$date)
            // ->get();




            $order_qunatity_history = DB::table('orders')
            // ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            // ->select('order_details.quantity')
            // ->where('orders.created_at','<',$date)
            ->get();

            $count_history=0;
            foreach ($order_qunatity_history as  $history) {

                $order_details=OrderDetail::where('order_id',$history->id)->get();

                foreach ($order_details as  $history) {
                    $count_history +=$history->quantity;
                }

                // $count_history +=$history->quantity;

            }
            $count_day=0;
            foreach ($order_qunatity as  $history) {
                $order_details=OrderDetail::where('order_id',$history->id)->get();

                foreach ($order_details as  $history) {
                    $count_day +=$history->quantity;
                }
            }


            $products=ProductRu::get();
            $list=[];
            foreach ($products as $product) {
                if ($product->parent_id !=0) {
                    $old_product=ProductRu::where('id',$product->parent_id)->first();
                    // dd($product);

                    $data=[
                     'product_name_ru'=>$product->product_name_ru,
                     'product_name_uz'=>$product->product_name_uz,
                     'price'=>$product->price,
                     'created_at'=>$product->created_at->format('y-m-d'),
                     'old_product_name_ru'=>$old_product->product_name_ru,
                     'old_product_name_uz'=>$old_product->product_name_uz,
                     'old_price'=>$old_product->price,
                     'old_created_at'=>$old_product->created_at->format('y-m-d'),
                    ];
                    array_push($list,$data );
                }
            }
            // $list=$list->paginate(10);/
            // dd($list);

        return view('admin.dashboard', compact('count_day','count_history','list'));

        }


 //================= Apies =======================

   public function new_user_api(Request $request)
   {
    $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'players' => 'required',
            'games_type' => 'required'
            // 'date'=>'required|date_format:mm/dd/yyyy',
            // 'time' => 'required|date_format:H:i:s',
        ]);


        // $users=User::where('status','active')->get();
        // foreach ($users as  $user) {
        //     if ($user->date== $request->date && $user->time== $request->time ) {
        //         // return response('');
        //         return response()->json(['Sorry, there is another player at this time']);
        //     }
        // }
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone_number;
        $user->players=$request->players;
        $user->games_type=$request->games;
        $user->date=$request->date;
        $user->time=$request->time;
        $user->status="active";
        // dd($user);
        return response()->json([
            "results" => "indoemation came",
        ]);

        // if ($user->save()) {
        //     return response()->json([
        //         "results" => $user,
        //     ]);
        // }

   }

}




