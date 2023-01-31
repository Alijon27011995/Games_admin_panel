<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\CategoryRu;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductRu;
use App\Models\ProductUz;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
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


        $products=ProductRu::get();
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
          'name'=>$request->name_ru,
          'price'=>$request->price,
          'foto'=>$filename,
          'category_id'=>$request->category_id,
          'description'=>$request->description_ru
       ]);
       $product=ProductUz::create([
        'name'=>$request->name_uz,
        'price'=>$request->price,
        'foto'=>$filename,
        'category_id'=>$request->category_id,
        'description'=>$request->description_uz,
     ]);
    //    dd($product);
    return redirect()->route("product.tables");
    }
       $categories=CategoryRu::pluck('name','id');
    //    dd($categories);
        return view('admin.forms.basic_elements', compact('categories'));

   }





   public function productShow($id)
   {


    $product_ru=ProductRu::where('id',$id)->first();
    $product_uz=ProductUz::where('id',$id)->first();
    $category=CategoryRu::where('id',$product_ru->category_id)->first();


    //    dd($id);
    //    return 'came';
    return view('admin.forms.product_show',compact('product_ru','product_uz','category'));
   }




   public function productEdit($id)
   {


    $product_ru=ProductRu::where('id',$id)->first();
    $product_uz=ProductUz::where('id',$id)->first();
    $category=CategoryRu::where('id',$product_ru->category_id)->first();
    $categories=CategoryRu::pluck('name','id');



    //    dd($id);
    //    return 'came';
    return view('admin.forms.product_edit',compact('product_ru','product_uz','category','categories'));
   }





   public function productUpdate(Request $request, CategoryRu $categoryRu)
   {

    //    dd($request->all());

       $filename = time() . '.'. $request->fotos->extension();
        $path=public_path('uploads/fotos/');
        // dd($path.$filename);
        $request->fotos->move($path, $filename);

        $product_ru=ProductRu::where('id',$request->product_id)->first();
        $product_uz=ProductUz::where('id',$request->product_id)->first();

        $product_ru->name=$request->name_ru;
        $product_ru->foto=$filename;
        $product_ru->description=$request->description_ru;
        $product_ru->category_id=$request->category_id;



        $product_uz->name=$request->name_uz;
        $product_uz->foto=$filename;
        $product_uz->description=$request->description_uz;
        $product_uz->category_id=$request->category_id;


        $product_ru->save();
        $product_uz->save();
        return redirect()->route("product.tables");
       // dd($user);
       // if ($user->save()) {
       // }

   }



   public function productDestroy($id)
   {
    //    dd($id);
    //    User::destroy(User::findOrFail($id)->user->id);


    $customer_ru = ProductRu::find($id);
    $customer_uz = ProductUz::find($id);
    $customer_ru->delete();
    $customer_uz->delete();
    // echo 'user delite';
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
            $tz = new DateTimeZone('Asia/tashkent');
            $mytime = Carbon::now($tz);
            $date=date($mytime->toDateString());
            $time=date($mytime->toTimeString());


        $users=User::where('status','active')->get();
        //    dd($users);
        foreach ($users as  $user) {
            //    dd($user);
                if ($user->date >= $date) {
                    if ($user->date > $date) {
                        $user->status='active';
                    }
                    elseif($user->date == $date && $user->time > $time){
                        $user->status='active';
                    }
                    elseif ($user->date == $date && $user->time < $time) {
                        $user->status='history';
                    }
                }
                else{
                $user->status='history';
                }
                $user->save();

        }

        $user_history=User::where('status','history')->count();
        $user_active=User::where('status','active')->count();



        return view('admin.dashboard', compact('user_active','user_history'));

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




