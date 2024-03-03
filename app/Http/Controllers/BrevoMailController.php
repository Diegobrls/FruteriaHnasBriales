<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\ApiException;
use SendinBlue\Client\Model\SendSmtpEmail;

class BrevoMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('SENDINBLUE_API_KEY'));
        $apiInstance = new TransactionalEmailsApi(null, $config);

        $email = new SendSmtpEmail([
            'to' => [['email' => $request->input('recipient_email')]],
            'subject' => $request->input('subject'),
            'htmlContent' => $request->input('content'),
            'sender' => ['email' => 'your_email@example.com', 'name' => 'Your Name']
        ]);

        try {
            $result = $apiInstance->sendTransacEmail($email);
            return response()->json($result);
        } catch (ApiException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
