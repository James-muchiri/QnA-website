<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Questions;
use App\Answers;
use App\Comments;
use App\Notfound;
use App\Saves;
use App\Orders;
use App\User;
use App\Account;
use Hash;
use App\Questions_files;
use App\Answers_files;
use PhpParser\Node\Stmt\Else_;
use Symfony\Component\Console\Question\Question;
use Redirect;
use Response;
use Session;
class AdminController extends Controller
{
    //post_category


    public function index()
    {

        $category = Category::all();
        $catcount = $category->count();
        $questions = Questions::all();
        $quizcount = $questions->count();
        $orders = Orders::all();
        $orderscount = $orders->count();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        $searches = Notfound::all();

        return view('admin.index', compact(['searches', 'category', 'questions', 'quizcount', 'catcount' , 'orderscount', 'comments', 'commentscount'  ]) );

    }
    public function post_category(Request $request)
    {

        $request->validate([
            'name'=>'required',

        ]);



        $contact = new Category([
            'name' => $request->get('name'),
                    ]);
        $contact->save();
       return redirect()->back()->with('success', 'Category saved');   

    }
    public function categories()
    {

        $category = Category::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.categories', compact(['category', 'comments', 'commentscount' ]) );

    }
    public function account()
    {

        $account = Account::first();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.account', compact(['account', 'comments', 'commentscount' ]) );

    }
    public function searches()
    {

        $searches = Saves::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.searches', compact(['searches', 'comments', 'commentscount' ]) );

    }
    public function missing()
    {

        $searches = Notfound::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.missing', compact(['searches', 'comments', 'commentscount' ]) );

    }
    public function browser()
    {

        $searches = Saves::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.browser', compact(['searches', 'comments', 'commentscount' ]) );

    }
    public function showcategories()
    {

        $category = Category::where('is_hidden', 'no')->get();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.showcategories', compact(['category', 'comments', 'commentscount' ]) );

    }
    public function hidecategories()
    {

        $category = Category::where('is_hidden', 'yes')->get();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.hidecategories', compact(['category', 'comments', 'commentscount' ]) );

    }


    public function frequentcategories()
    {

        $category = Category::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.frequentcategories', compact(['category', 'comments', 'commentscount' ]) );

    }
    public function questions()
    {

        $category = Category::all();
        $questions = Questions::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.questions', compact(['category', 'questions', 'comments', 'commentscount' ]) );

    }

    public function hiddenquestions()
    {

        $category = Category::all();
        $questions = Questions::where('is_hidden', 'yes')->get();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.questions', compact(['category', 'questions', 'comments', 'commentscount' ]) );

    }

    public function addquestions()
    {

        $category = Category::all();
        $questions = Questions::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.addquestion', compact(['category', 'questions', 'comments', 'commentscount' ]) );

    }

    public function orders()
    {

        $category = Category::all();
        $orders = Orders::all();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.orders', compact(['category', 'orders', 'comments', 'commentscount' ]) );

    }
    public function pendingorders()
    {

        $category = Category::all();
        $orders = Orders::where('status', 'unpaid')->get();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.pendingorders', compact(['category', 'orders', 'comments', 'commentscount' ]) );

    }
    public function completedorders()
    {

        $category = Category::all();
        $orders = Orders::where('status', 'paid')->get();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        return view('admin.completedorders', compact(['category', 'orders', 'comments', 'commentscount' ]) );

    }



   public function readcomentt(Request $request)
   {



    $comment = Comments::find($request->id);
    $comment->status='yes';

    $comment->save();
    $comments = Comments::where('status', 'no')->get();
    $commentscount = $comments->count();
    return view('admin.readcoment', compact(['comment', 'comments', 'commentscount'  ]) );



   }
   public function accountchange(Request $request)
   {



    $account = Account::find($request->id);
    if(!$account){
      $account = new Account([


        "client_id" => $request->get('client'),
     
        "secret_id" => $request->get('secret'),
      
    ]);
    $account->save(); // Finally, save the record.
    return redirect()->back()->with('success', 'Account saved');   

    } else{
    $account->client_id =$request->client;
    $account->secret_id =$request->secret;
    $account->save();
   
    return redirect()->back()->with('success', 'Account Changed');   

    }
   }
   public function read($dataId)
   {



    $comment = Comments::find($dataId);
    $comment->status='yes';

    $comment->save();
$output = "Message marked as read";

return response()->json(['success'=> 'message marked as read']);


   }
   public function messages()
   {



    $comments = Comments::where('status', 'no')->get();
    $readcomments = Comments::where('status', 'yes')->get();
    $comm = Comments::all()->groupBy('status' );

    $commentscount = $comments->count();
    return view('admin.allcomments', compact([ 'comments', 'readcomments', 'comm', 'commentscount'  ]) );

   // if($request->hasFile('file1')) {}


   }

   public function show_cartegories($dataID)
   {
       $category = Category::where('id', $dataID)->first();

       $category->is_hidden='no';

       $category->save();
      
       return redirect()->back()->with('success', 'Category will be seen by user');   


   }

   public function hide_cartegories($dataID)
   {
       $category = Category::where('id', $dataID)->first();

       $category->is_hidden='yes';

       $category->save();
  
       return redirect()->back()->with('success', 'Category will not be seen by user');   


   }

   public function edit_category(Request $request)
   {
       $category = Category::where('id', $request->id)->first();

       $category->name=$request->name;

       $category->save();

       return redirect()->back()->with('success', 'Category saved');   


   }


   public function delete_cartegories($dataID)
    {
        $category = Category::where('id', $dataID)->first();

        $category->delete();

        return redirect()->back()->with('success', 'Category delete');   


    }
    public function fetchcat(Request $request)
    {


        $cart=  Category::where('id', $request->catid)->first();
              $output="";
              $out=$cart['name'];


        $output.='<input type="text" class="form-control" id="recipient-name" value="'.$cart['id'].'" name="id" required hidden>'.
        '<input type="text" class="form-control" id="recipient-name" value="'.$out.'" name="name" required>';

        return Response($output);




       // return response()->json($products);

       // return response()->json(['success'=>'Ajax request submitted successfull]);
    }
    public function delete_product($dataID)
    {
        $category = Questions::where('id', $dataID)->first();
        $category->delete();    
        return redirect()->back()->with('success', 'Question Deleted');   



    }

    public function removeimage(Request $request) 
    {
        $category = Questions_files::where('id', $request->id)->first();
        $id = $request->id;
        $category->delete();    
        return response()->json($id);



    }
    public function removeanswer(Request $request) 
    {
        $category = Answers_files::where('id', $request->id)->first();
        $id = $request->id;
        $category->delete();    
        return response()->json($id);



    }

    public function show_product($dataID)
    {
        $category = Questions::where('id', $dataID)->first();

        $category->is_hidden='no';

        $category->save();
      
        return redirect()->back()->with('success', 'Question Displayed');   


    }



    public function hide_product($dataID)
    {
        $category = Questions::where('id', $dataID)->first();

        $category->is_hidden='yes';

        $category->save();
      
        return redirect()->back()->with('success', 'Question hidden');   
    }

    public function edit_product(Request $request)
    {
        $question = Questions::where('id', $request->id)->first();
        $comments = Comments::where('status', 'no')->get();
        $commentscount = $comments->count();
        $category = Category::all();
        return view('admin.editquestion', compact([ 'comments', 'question', 'category', 'commentscount'  ]) );



    }

    public function store_questionn(Request $request)   {

        $total = count($_FILES['file']['name']);
        $questionid = uniqid();
        $answerid = uniqid();
if ($total > 1) {
  


        foreach($request->file('file') as $file){

         
              //Setup our new file path
                $type=$file->getClientMimeType();
              $extensions=array( 'image/jpeg', 'image/png', 'image/jpg' );
              $extensions1=array( 'application/pdf');
              if( in_array( $type, $extensions )){
                $imageName = $file->hashName();
              //  return response()->json($imageName);

                $file->move(public_path('product'), $imageName);
                // Store the record, using the new file hashname which will be it's new filename identity.
              
                $product = new Questions_files([
 
 
                   
                    "file" => $imageName,
                    "type" => 'image',
                    "questionid" => $questionid,
                
                ]);
                $product->save(); // Finally, save the record.




              }
              elseif( in_array( $type, $extensions1 )){
                $imageName = $file->hashName();
              //  return response()->json($imageName);

                $file->move(public_path('product'), $imageName);
                // Store the record, using the new file hashname which will be it's new filename identity.
              
                $product = new Questions_files([
 
 
                   
                    "file" => $imageName,
                    "type" => 'pdf',
                    "questionid" => $questionid,
                
                ]);
                $product->save(); // Finally, save the record.




              }
           
           
          }
        } 
          $product = new Questions([


            "description" => $request->get('description'),
            "file" =>'null',
            "category" => $request->get('category'),
            "type" => 'null',
            "questionid" => $questionid,
            "html" => $request->get('question'),
        ]);
        $product->save(); // Finally, save the record.


       
// save answer
$total1 = count($_FILES['file1']['name']);
if ($total1 > 1) {
  


        foreach($request->file('file1') as $file){

         
            //Setup our new file path
              $type=$file->getClientMimeType();
            $extensions=array( 'image/jpeg', 'image/png', 'image/jpg' );
            $extensions1=array( 'application/pdf');
            if( in_array( $type, $extensions )){
              $imageName = $file->hashName();
            //  return response()->json($imageName);

              $file->move(public_path('product'), $imageName);
              // Store the record, using the new file hashname which will be it's new filename identity.
            
              $product = new Answers_files([


                 
                  "file" => $imageName,
                  "type" => 'image',
                  "answerid" => $answerid,
              
              ]);
              $product->save(); // Finally, save the record.




            }
            elseif( in_array( $type, $extensions1 )){
              $imageName = $file->hashName();
            //  return response()->json($imageName);

              $file->move(public_path('product'), $imageName);
              // Store the record, using the new file hashname which will be it's new filename identity.
            
              $product = new Answers_files([


                 
                "file" => $imageName,
                "type" => 'image',
                "answerid" => $answerid,
            
            ]);
              $product->save(); // Finally, save the record.




            }
         
         
        }

    }
        $product = new Answers([

            "price" => $request->get('price'),           
            "preview" => $request->get('preview'),
            "file" =>'null',          
            "type" => 'null',
            "questionid" => $questionid,
            "html" => $request->get('answer'),      
            "answerid" => $answerid,
           
        ]);
        $product->save(); // Finally, save the record.




        return Redirect::back()->with('success', 'Question Saved!');




       
    }

    public function update_questionn(Request $request)   {

        $updateid = $request->id;
        $questionupdate = Questions::where('id', $updateid)->first();
        $questionupdateid = $questionupdate->questionid;
        $answerupdate = Answers::where('questionid', $questionupdateid)->first();
        $answerupdateid = $answerupdate->answerid;
        $total = count($_FILES['file']['name']);
       
if ($total > 1) {
  


        foreach($request->file('file') as $file){

         
              //Setup our new file path
                $type=$file->getClientMimeType();
              $extensions=array( 'image/jpeg', 'image/png', 'image/jpg' );
              $extensions1=array( 'application/pdf');
              if( in_array( $type, $extensions )){
                $imageName = $file->hashName();
              //  return response()->json($imageName);

                $file->move(public_path('product'), $imageName);
                // Store the record, using the new file hashname which will be it's new filename identity.
              
                $product = new Questions_files([
 
 
                   
                    "file" => $imageName,
                    "type" => 'image',
                    "questionid" => $questionupdateid,
                
                ]);
                $product->save(); // Finally, save the record.
              
            


              }
              elseif( in_array( $type, $extensions1 )){
                $imageName = $file->hashName();
              //  return response()->json($imageName);

                $file->move(public_path('product'), $imageName);
                // Store the record, using the new file hashname which will be it's new filename identity.
              
                $product = new Questions_files([
 
 
                   
                    "file" => $imageName,
                    "type" => 'pdf',
                    "questionid" => $questionupdateid,
                
                ]);
                $product->save(); // Finally, save the record.




              }
           
           
          }
        } 
        
        $questionupdate->description=$request->get('description');
        $questionupdate->category=$request->get('category');
        $questionupdate->html=$request->get('question');
        $questionupdate->save();
       
         
      

       
// save answer
$total1 = count($_FILES['file1']['name']);

if ($total1 > 1) {
  


        foreach($request->file('file1') as $file){

         
            //Setup our new file path
              $type=$file->getClientMimeType();
            $extensions=array( 'image/jpeg', 'image/png', 'image/jpg' );
            $extensions1=array( 'application/pdf');
            if( in_array( $type, $extensions )){
              $imageName = $file->hashName();
            //  return response()->json($imageName);

              $file->move(public_path('product'), $imageName);
              // Store the record, using the new file hashname which will be it's new filename identity.
            
              $product = new Answers_files([


                 
                  "file" => $imageName,
                  "type" => 'image',
                  "answerid" => $answerupdateid,
              
              ]);
              $product->save(); // Finally, save the record.




            }
            elseif( in_array( $type, $extensions1 )){
              $imageName = $file->hashName();
            //  return response()->json($imageName);

              $file->move(public_path('product'), $imageName);
              // Store the record, using the new file hashname which will be it's new filename identity.
            
              $product = new Answers_files([


                 
                "file" => $imageName,
                "type" => 'image',
                "answerid" => $answerupdateid,
            
            ]);
              $product->save(); // Finally, save the record.




            }
         
         
        }

    }
      
            $answerupdate->price = $request->get('price');        
            $answerupdate->preview = $request->get('preview');
                  
            $answerupdate->html = $request->get('answer');        
        $answerupdate->save(); // Finally, save the record.




        return Redirect::route('questions');



       
    }

  

   public function change_password(Request $request)
   {
      $this->validate($request, [
           'newpassword' => 'required| min:4| max:7 |confirmed',
           'oldpassword' => 'required'

       ]);




      $id = auth()->guard('adminauth')->user()->id;
      $user=  User::where('id', $id)->first();

       $user->password= Hash::make($request->newpassword);

       $user->save();

       return response()->json(['success'=>'Password changed successfullly']);

   }



}
