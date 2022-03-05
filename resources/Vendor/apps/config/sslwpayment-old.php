<?php

return [
    'store_id' => env('SSLWPAYMENT_STORE_ID',''),
    'store_password' => env('SSLWPAYMENT_STORE_PASSWORD',''),
    'sandbox' => env('SSLWPAYMENT_SANDBOX', ''),
    'redirect_url' => [
        'fail' => 'sslpayment.failed', // payment.failed
        'success' => 'sslpayment.success', //payment.success
        'cancel' => 'sslpayment.cancel', // payment/cancel or you can use route also
        ]
];
