<?php

namespace App\Http\Controllers;

use App\Transaccion;
use Illuminate\Http\Request;
use \Transbank\Webpay\Configuration;
use \Transbank\Webpay\Webpay;

class TransaccionController extends Controller
{
    /**
     * Start WebPay
     *
     * @return \Illuminate\Http\Response
     */
    public function init(Request $request)
    {
        $transaction = null;

        if (App::enviroment("local")) {
            $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
                ->getNormalTransaction();
        } else {
            $configuration = new Configuration;
            $configuration->setEnvironment("PRODUCCION");
            $configuration->setCommerceCode(config('webpay.commerce_code'));
            $configuration->setPublicCert(config('webpay.public_cert'));
            $configuration->setPrivateKey(config('webpay.private_key'));

            $transaction = new Webpay($configuration);
        }

        if ($transaction != null) {
            $monto = 0;
            $sessionId = 0;
            $buyOrder = 0;
            $returnUrl = "";
            $finalUrl = "";
            $initResult = $transaction->initTransaction($amount, $buyOrder, $sessionId, $returnUrl, $finalUrl);

            $formAction = $initResult->url;
            $tokenWs = $initResult->token;

            return view('control/webpay/init')->with(compact('formAction', 'tokenWs'));
        }

        return redirect()->route('home');
    }

    /**
     * Generación del voucher
     *
     * @return \Illuminate\Http\Response
     */
    public function voucher(Request $request)
    {

        if (!$request->has('token_ws')) {
            return 'Error. No token recibido';
        }

        $transaction = null;

        if (App::enviroment("local")) {
            $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();
        } else {
            $configuration = new Configuration;
            $configuration->setEnvironment("PRODUCCION");
            $configuration->setCommerceCode(config('webpay.commerce_code'));
            $configuration->setPublicCert(config('webpay.public_cert'));
            $configuration->setPrivateKey(config('webpay.private_key'));

            $transaction = new Webpay($configuration);
        }

        if (isset($transaction)) {
            $tokenWs = $request->input('token_ws');
            $result = $transaction->getTransactionResult($tokenWs);
            $output = $result->detailOuput;
            $formAction = $result->getUrlRedirection();

            if ($output->responseCode == 0) {
                return view('control/webpay/init')->with(compact('tokenWs', 'formAction'));
            } else {
                return view('control/webpay/rechazo')->with(compact('output'));
            }

            return view('control/webpay/rechazo')->with(compact('output'));
        }

    }


    /**
     * Finaliza la compra en Webpay
     *
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request)
    {
        if (!$request->has('token_ws')) {
            return 'Error. No token recibido';
        }

        $transaction = null;

        if (App::enviroment("local")) {
            $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();
        } else {
            $configuration = new Configuration;
            $configuration->setEnvironment("PRODUCCION");
            $configuration->setCommerceCode(config('webpay.commerce_code'));
            $configuration->setPublicCert(config('webpay.public_cert'));
            $configuration->setPrivateKey(config('webpay.private_key'));

            $transaction = new Webpay($configuration);
        }

        $tokenWs = $request->input('token_ws');
        $result = $transaction->getTransactionResult($tokenWs);
        $output = $result->detailOuput;

        if ($output->responseCode == 0) {
            return view('control/webpay/exito')->with(compact('output'));
        } else {
            return view('control/webpay/rechazo')->with(compact('output'));
        }

    }

}
