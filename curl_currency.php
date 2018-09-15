<?php
if ( !function_exists('convertCurrency'))
{
    function convertCurrency($amount,$from_currency,$to_currency)
    {
        $from_Currency  = urlencode($from_currency);
        $to_Currency    = urlencode($to_currency);
        $query          =  "{$from_Currency}_{$to_Currency}";
        $json           = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=ultra");
        $obj            = json_decode($json, true);
        $val            = floatval($obj["$query"]);
        $total          = $val * $amount;
        return number_format($total, 2, '.', '');
    }
    
}

//uncomment to test
echo convertCurrency(14808, 'IDR', 'USD');