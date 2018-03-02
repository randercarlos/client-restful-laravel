<?php

include_once '../bootstrap/start.php';

$token = login();
$result = products($token, (isset($_GET['page']) && $_GET['page']) > 0 ? $_GET['page'] : null);
$products = $result->data;
$total_page = $result->last_page;


if (isset($products) && count($products) > 0) {
    foreach($products as $product) {
        echo 'Nome: ' . $product->name . '<br />';
        echo 'Descrição: ' . $product->description;
        echo '<hr />';
    }

    for($i = 1; $i <= $total_page; $i++) {
        echo "<a href='?page=$i'>$i</a>";
        echo '&nbsp;&nbsp;&nbsp;';
    }
} else {
    echo 'Nenhum produto encontrado!';
}



function login() 
{
    $email = 'teste@teste.com';
    $password = 'teste';

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_CUSTOMREQUEST   => 'POST',
        CURLOPT_POSTFIELDS      => [
            'email' => $email, 
            'password' => $password
        ],
        CURLOPT_URL             => 'http://restful-laravel.local/api/v1/auth'
    ]);
    $response = json_decode(curl_exec($curl));
    curl_close($curl);

    return $response->token;
}

function products($token, $page = null)
{
    $curl = curl_init();

    $url  = 'http://restful-laravel.local/api/v1/products';
    $url .= !is_null($page) ? "?page=$page" : '';

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_URL             => $url,
        CURLOPT_HTTPHEADER      => [
            "Authorization: Bearer {$token}"
        ]
    ]);
    $response = json_decode(curl_exec($curl));
    curl_close($curl);

    return $response;
}