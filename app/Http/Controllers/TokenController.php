<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;

class TokenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveToken(Request $request)
    {
        $input = $request->all();
        Token::create(['token'=>$input['currentToken']]);
        return response()->json(['success'=>'Token Saved.']);
    }

    public function sendNotification(Request $request)
    {
    	$input = $request->all();
    	$SERVER_API_KEY = "AIzaSyBr_R6a-RiiOwRmxyT2knrBiNovfCnYGr4";

    	$tokens = ["etBTpnq5j6_BN2-2xv7cHV:APA91bG5yHehBAEm5pQZLnG9dNlD76CwhFqiIfSMXrMISXqmOK67HKY-BtwNAQN3Ta2gtoK31cGQ4s7nL-_i4arS4I9Q2pqGI1cFEeFfOBYBBSIRtPwIc2hyhbhkOKM2ZA6TWZwgZcNI","cK0Jx5benFBhxAY8l_xSZU:APA91bESh9_5gTzEBy1rLWmDKjgsF7Wa__qOfe4_EX_VDNndF1OeP89xvmAEBUb7jkJVXdM7UHpF9HP7ryfCtsUJBfqKKtGXijtlmGvFVgqoEt3CkigiJjlLOuRr7cLthcnPSL_RmfKT","ervi4hNe_sMGDz1VMMGvIx:APA91bENwvabdV7TFgYvNXMhhE_KeJTcVfma5UkfTrLI84RBPip4NKHGMFnTGJmZpsPhWc84eBZQ__b3tZXbErzByvaKhAZSGwOBv9gu9WRpJryt76eh33Pj-vS4YcT8YwGwTfAIBH4n","d_e7bs2z89pk_M0HPdd89e:APA91bHVKQNTWhQDIVM58cYhWuyXW13i9BNglztPwfLCKW_dmnG3YxWccQWyabu2p9tzhBEIKKvQzXRANgCfG6XDqfZr9Y5cS_DiKlXW1-4pglXZT016Xz17ucJIq15G44QFDHcyxVSS"];


    	$msg = [
    		'title' => 'Testing Title',
    		'body' => 'Testing Description',
    		'link' => 'https://nicesnippets.com'
    	];

    	$payload = [
    		'registration_ids' => $tokens,
    		'data' => $msg
    	];

    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($payload),
		  CURLOPT_HTTPHEADER => array(
		    "authorization: key=AIzaSyAz9LWo6X8oTb1UEmvfqokRuWYdfytD4Bk",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}

    }
}
