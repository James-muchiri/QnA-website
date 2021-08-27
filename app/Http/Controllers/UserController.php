<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Orders;
use App\Answers;
use App\Comments;
use App\Notfound;
use App\Questions;
use App\Saves;
use App\Myquestions;
use Symfony\Component\Console\Question\Question;
use Redirect;
use Jenssegers\Agent\Agent;
use Symfony\Component\VarDumper\Cloner\Data;

class UserController extends Controller
{
    //
    public function index()
    {
        $category = Category::inRandomOrder()->limit(4)->get();
        $questions = Questions::all();
        $frequent = Questions::inRandomOrder()->limit(10)->get();
        return view('index', compact(['category', 'questions', 'frequent' ]) );


    }

    public function myquestion()
    {


        $quiz = explode(",", $_GET['quizId']);
        

        $category = Category::inRandomOrder()->limit(4)->get();
        $questions = Questions::all();
        $Myquestions = Myquestions:: where('myquestionsid', $quiz)->first();
        if (!$Myquestions) {

            $myquestions = [];
           
        } else {
            # code...

            $myquestions = $Myquestions->myquestions;
        }
        

      //  return response()->json($myquestions);
        return view('myquestions', compact(['category', 'questions', 'myquestions' ]) );


    }
    public function myorders()
    {
        $category = Category::inRandomOrder()->limit(4)->get();
        $questions = Questions::all();
        return view('myorders', compact(['category', 'questions' ]) );


    }
     public function myorder(Request $request)
    {

        $data = $request->orderid;
        $order = Orders::where('orderid', $data)->get();
        return response()->json($order);


    }

    public function checkoutcart()
    {

        $cart = session()->get('cart');
        if(!$cart){
            return redirect()->route('index');
        }else{

        $category = Category::inRandomOrder()->limit(4)->get();
        $questions = Questions::all();
        $cart = session()->get('cart');
        return view('checkoutcart', compact(['category', 'questions','cart']) );

        }
    }


    public function checkout(Request $request)
    {

        $request->validate([

            'names' =>'required',
            'email' =>'required',
        ]);
        $cart = session()->get('cart');
        $total  = 0;
foreach ($cart as $cat ) {
  $total1 =  $cat['price'];
   $total = $total + $total1;
}

$cart = session()->get('cart');
        $cartcount = count($cart);
        $order= new Orders();
        $order->name = $request->get('names');
        $order->email = $request->get('email');
        $order->question =  serialize($cart);
        $order->order_number =uniqid();
        $order->orderid = $request->get('orderid');
        $order->questions = $cartcount;
        $order->total = $total;

        $order->save(); // Finally, save the record.


        $cartcount = count($cart);
        session()->put('order_number', $order->order_number);
      //  return redirect('/success');
      session()->forget('cart');

      return response()->json($order->order_number);


    }


    public function success()
    {
       $number = session()->get('order_number');
        $category = Category::inRandomOrder()->limit(4)->get();
        $questions = Questions::all();


        $order = Orders::where('order_number', $number)->first();
        return view('success', compact(['category', 'questions', 'order',  ]) );


    }

    public function addToCart(Request $request,$dataId)
    {
        session()->get('cart');
        // dd($dataId);
              $product = Questions::find($dataId);

            $product1 = Answers::where('questionid', $product->questionid)->first();
        // dd($product);
        $cart = session()->get('cart');
        // dd($cart);

        if(!$cart) {

            $cart = [
                $dataId => [
                    "id"=>$product->id,
                    "description" => $product->description,
                    "category" => $product->category,                
                    "html" => $product->html,
                    "questionid" => $product->questionid,
                    "price" => $product1->price,
                    
                ]
            ];
            // dd($cart);
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            return response()->json($cart);
        }


        if(isset($cart[$dataId])) {

            // dd(session()->get('cart'));
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
                // dd($cart[$dataId]['quantity']);
                return response()->json($cart);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$dataId] = [
            "id"=>$product->id,
            "description" => $product->description,
            "category" => $product->category,                
            "html" => $product->html,
            "questionid" => $product->questionid,
            "price" => $product1->price,

        ];

        session()->put('cart', $cart);

        return response()->json($cart);


    }
    public function getCart(Request $request){

        $data=session()->get('cart');

        // dd($data);
        // dd(response()->json($data));
           return response()->json($data);
    }


    public function getRemoveItem($dataId){

        $cart = session()->get('cart');
           // dd($cart[$dataId]);
           if(isset($cart[$dataId])) {

               unset($cart[$dataId]);

               session()->put('cart', $cart);
               // dd(session()->get('cart'));
               return Redirect::back()->withSuccess(['success', 'The Message']);
           }
       }

       public function comments(Request $request)
       {
        $request->validate([

            'fname' =>'required',
            'email' =>'required',
        ]);


        $comment= new Comments();
        $comment->fname = $request->get('fname');
        $comment->email = $request->get('email');
        $comment->tel = $request->get('tel');
        $comment->comments = $request->get('comment');
        $comment->save(); // Finally, save the record.


        return response()->json(['success'=> 'Your Message have been received, Our support team will get back to your']);



    }



    public function search(Request $request){
        $query = "%".$request->key."%";
        $categories = Questions::where('description','LIKE',$query)->where('is_hidden','=','no')->get();

        foreach($categories as $category){
            echo "<div id='item'>";
            echo "<a href='search/$category->description'>$category->description</a>";
            echo "</div>";
            echo "<br>";
        }
    }


    public function search1(Request $request){

        $categories = $request->categories;
        $query = "%".$request->data."%";

        ///agent details
        $agent = new Agent();


if ($agent->isRobot()) {
//dddddddo nothing
}
else {
    //if agent is not robot then get agent browser and platform like Chrome in Linux
    $browser = $agent->browser() . " in " . $agent->platform();
    $browserip =  request()->getClientIp();
    $saves= new Saves();
    $saves->search = $query;
    $saves->categories = $categories;
    $saves->IP = $browserip;
    $saves->browser = $browser;
    $saves->save(); // Finally, save the record.

}




    if($categories='all'){

        $products = Questions::where('description','LIKE',$query)->orwhere('category','LIKE',$query)->orwhere('html','LIKE',$query)->where('is_hidden','=','no')->get();
    }
    else {
        $products = Questions:: where('description','LIKE',$query)->orwhere('html','LIKE',$query)
        ->where('category','=',$categories)->where('is_hidden','=','no')->get();
    }

    $cart=session()->get('cart');
    $category = Category::all();

    $quizcount = $products->count();
    if ($quizcount == 0) {
        $not= new Notfound();
        $not->search = $query;

        $not->save(); // Finally, save the record.


    }
    return view('search', compact(['products', 'cart', 'category']));
}






public function searchbycat($dataId)
{


    $products = Questions::where('category','LIKE',$dataId)->where('is_hidden','=','no')->get();

    $cart=session()->get('cart');
    $category = Category::inRandomOrder()->limit(4)->get();
    return view('search', compact(['products', 'cart', 'category']));
}




public function getRemoveqiuz(Request $request)
{

    $Myquestions = Myquestions:: where('myquestionsid', $request->myquestionsid)->first();
    $myquiz =$Myquestions->myquestions;
         
//  unset($myquiz[$request->dataId]);
  $myquiz = array_diff($myquiz, array($request->dataId) );
    $Myquestions ->myquestions= $myquiz;
    
    $Myquestions ->save();
    return response()->json(['success'=> 'Question Saved']);


}

public function savequiz(Request $request)
{

    
    $Myquestions = Myquestions:: where('myquestionsid', $request->myquestionsid)->first();
    if(!$Myquestions){

        $myquiz =  array($request->dataId);


       
        $Myquestions = new Myquestions([

        
            "myquestionsid" => $request->myquestionsid,
            "myquestions" => $myquiz,
          
          
           
        ]);
        $Myquestions->save(); // Finally, save the record.


        return response()->json(['success'=> 'Question Saved']);

    }
    else{

        $myquiz =$Myquestions->myquestions;
            
          $id = $request->dataId;
        if (in_array($id, $myquiz))
        {
            return response()->json(['success'=> 'Question Already Saved']);

        }
      else
        {
            
        array_push($myquiz, $request->dataId);

    
    $Myquestions ->myquestions= $myquiz;
    
    $Myquestions ->save();
    return response()->json(['success'=> 'Question Saved']);

        }

    


       
    }



        



}


public function complete(){

$data=session()->get('data');
  // $data="611a2a664683a";
   $quizs = Orders:: where('order_number', $data)->first();

   $category = Category::inRandomOrder()->limit(4)->get();
   $questions = Questions::all();
   $frequent = Questions::inRandomOrder()->limit(10)->get();
   return view('complete', compact(['category', 'questions', 'quizs' ]) );

}


public function order($dataId){

    $data=$dataId;
            $quizs = Orders:: where('order_number', $data)->first();

       $category = Category::inRandomOrder()->limit(4)->get();
       $questions = Questions::all();
       $frequent = Questions::inRandomOrder()->limit(10)->get();
       return view('completed', compact(['category', 'questions', 'quizs' ]) );

    }
}



