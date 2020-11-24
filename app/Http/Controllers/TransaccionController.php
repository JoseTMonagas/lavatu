<?php

namespace App\Http\Controllers;

use App\OrdenTrabajo;
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
    public function init(OrdenTrabajo $ordenTrabajo)
    {
        $transaction = null;

        $transactionData = [
            "monto" => $ordenTrabajo->total,
            "sessionId" => session()->getId(),
            "buyOrder" => $ordenTrabajo->id,
            "returnUrl" => route('webpay.voucher', $ordenTrabajo),
            "finalUrl" => route('webpay.finish', $ordenTrabajo),
        ];

        if (env('APP_ENV') == "local") {
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


        if ($transaction != null && !\Arr::has($transactionData, null)) {
            $initResult = $transaction->initTransaction(
                $transactionData["monto"],
                $transactionData["buyOrder"],
                $transactionData["sessionId"],
                $transactionData["returnUrl"],
                $transactionData["finalUrl"],
            );

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
    public function voucher(OrdenTrabajo $ordenTrabajo, Request $request)
    {

        if (!$request->has('token_ws')) {
            return 'Error. No token recibido';
        }

        $transaction = null;

        if (env('APP_ENV') == "local") {
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
            $output = $result->detailOutput;

            $orden = OrdenTrabajo::find(intval($output->buyOrder));
            $orden->result = json_encode($output);
            $orden->save();

            session(["orden_id" => $orden->id]);

            $formAction = $result->urlRedirection;

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
    public function finish(OrdenTrabajo $ordenTrabajo, Request $request)
    {

        $result = json_decode($ordenTrabajo->result, true);

        if (isset($result)) {
            if ($result["responseCode"] == 0) {
                return view('control/webpay/exito')->with(compact('result', 'ordenTrabajo'));
            }  
        }

            return view('control/webpay/rechazo')->with(compact('result', 'ordenTrabajo'));


    }

}
