<?php
class XmlApiConversion
{
    public $apiUrl = 'http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml'; 
    public function __constuct()
    {
    }
    public function fetchXMLData()
    {
        try{

            $xml = $this->generateXmlDataFromURl();
            $xmldata = simplexml_load_string($xml);
            
            $jsondata = json_encode($xmldata);
            // Display json data
            print_r($jsondata);

        }catch(Exception $e){
            var_dump($e);
        }
        
      
    }


    public function generateXmlDataFromURl(){
        // var_dump($this->apiUrl);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    
        $xmlstr = curl_exec($ch);
        curl_close($ch);
    
        return $xmlstr;
    }
}

$apiConversion = new XmlApiConversion();
$apiConversion->fetchXMLData();