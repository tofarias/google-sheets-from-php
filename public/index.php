<?php

require __DIR__.'/../bootstrap.php';

use GoogleSheet\GClient;
use Google_Service_Sheets_ValueRange as GServiceSheetsValueRange;

$gc = new GClient('servicekey.json', 'ID-DA-PLANILHA');

// aqui você pode mudar o valor do mês para testar
$mesAtual = 6;

// aqui sera verificado automaticamente o mes atual
#$mesAtual = date('n');



$sheet = $gc->getSpreadSheetId();
$range = 'Página1!A'.$mesAtual;
$service = $gc->getGoogleServiceSheet();

$valueRange= new GServiceSheetsValueRange();

$valueRange->setValues(["values" => ['Valor para o mês '.$mesAtual]]); 
$conf = ["valueInputOption" => "RAW"];
$ins = ["insertDataOption" => "INSERT_ROWS"];
$service->spreadsheets_values->append($sheet, $range, $valueRange, $conf, $ins);
