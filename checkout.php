<?php
session_start();
include('config.php');

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51OzF5t2Ks3vyzGvltt7Y6dL28Fqw7qW03NSCioIiSLLXZ3ZXO5NOALVl4DMkdwbujjBXG827nZHBhOizA2R5FfLn0080VAPPpf";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:8011/rentnest%20project/updating-subcribe.php",
    "cancel_url" => "http://localhost/payment-gateway.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 4000,
                "product_data" => [
                    "name" => "First-subscription"
                ]
            ]
        ],
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
