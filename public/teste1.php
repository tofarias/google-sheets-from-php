<?php

require __DIR__.'/../bootstrap.php';

use GoogleSheet\GClient;
use Google_Service_Sheets_ValueRange as GServiceSheetsValueRange;

$gc = new GClient('servicekey.json', 'ID-DA-PLANILHA');

$sheet = $gc->getSpreadSheetId();
$range = 'Página1';
$service = $gc->getGoogleServiceSheet();

$valueRange= new GServiceSheetsValueRange();

for( $i = 1; $i <= 12; $i++ )
{
    $valueRange->setValues(["values" => ['Valor para o mês '.$i]]); 
    $conf = ["valueInputOption" => "RAW"];
    $ins = ["insertDataOption" => "INSERT_ROWS"];
    $service->spreadsheets_values->append($sheet, $range, $valueRange, $conf, $ins);
}
