<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Account;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Orders;
class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = config('paypal');

        $account = Account::first();
        

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
          $account->client_id,
          $account->secret_id)
            );
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }


  

    public function postPaymentWithpaypal(Request $request)
    {
   
        $order = Orders::where('order_number', $request->order)->first();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName($order['order_number'])
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($order['total']);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($order['total']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('success');
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('success');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());
        Session::put('product_id', $order->order_number);
        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('success');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');
        $order_number = Session::get('product_id');

        Session::forget('paypal_payment_id');
        Session::forget('product_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('success');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            



            $order = orders::where('order_number', $order_number)->first();
            $order->status='paid';
        
            $order->save();
        
            Session::put('data', $order_number);
            return Redirect::route('completed');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('paywithpaypal');
    }
}
