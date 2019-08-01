<?php

namespace GoogleSheet;

use \Google_Client as GoogleClient;
use \Google_Service_Sheets as GoogleServiceSheets;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class GClient
{
    private $googleClient;
    private $googleServiceSheet;
    private $serviceKeyJsonFile;
    private $spreadSheetId;

    /***
     * @param string $serviceKeyJsonFile
     * @param string $spreadSheetId
     */
    public function __construct(String $serviceKeyJsonFile, String $spreadSheetId)
    {
        $this->serviceKeyJsonFile = $serviceKeyJsonFile;
        $this->spreadSheetId      = $spreadSheetId;

        $this->setGoogleClient();
        $this->setGoogleServiceSheet();        
    }

    private function setGoogleClient()
    {
        $this->googleClient = new GoogleClient();
        $this->googleClient->setApplicationName('YOURAPPNAME');
        $this->googleClient->setScopes([GoogleServiceSheets::SPREADSHEETS]);
        $this->googleClient->setAccessType('offline');
        $this->googleClient->setAuthConfig(__DIR__ . '/../'.$this->serviceKeyJsonFile);
    }

    private function setGoogleServiceSheet()
    {
        $this->googleServiceSheet = new GoogleServiceSheets( $this->googleClient );
    }

    public function getSpreadSheetId() : String
    {
        return $this->spreadSheetId;
    }

    public function getGoogleServiceSheet() : GoogleServiceSheets
    {
        return $this->googleServiceSheet;
    }

    public function getGoogleClient() : GoogleClient
    {
        return $this->googleClient;
    }

    public function read() : void
    {
        $range = 'Página1!A1:C1';
        $response = $this->googleServiceSheet->spreadsheets_values->get($this->spreadSheetId, $range);
        $values = $response->getValues();
        
        if (empty($values)) {
            print 'No data found.\n';
        }else {
            foreach ($values as $row) {
                for ($i = 0; $i < sizeof($row); $i++) {
                    echo $row[$i].'\n';
                }
            }
        }
    }
}