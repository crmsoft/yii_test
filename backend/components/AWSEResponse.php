<?php
/**
 * Created by PhpStorm.
 * User: ahtem
 * Date: 06.05.2018
 * Time: 18:54
 */

namespace app\components;

class AWSEResponse{

    private $response;
    private $errorMessage = [];

    private $data = [];
    /**
     * AWSEResponse constructor.
     * @param $xmlResponse
     */
    public function __construct($xmlResponse){
        $this->response = $xmlResponse;
        $this->load();
    }

    /**
     * fill data array with needed values
     */
    private function load(){

        $xml = simplexml_load_string($this->response);
        if($xml){
            if(!$this->isResponseSuccessFull($xml)) {

                $item = $xml->Items->Item;

                $this->data['title']   = $item->ItemAttributes->Title->__toString();
                $this->data['ean']     = $item->ItemAttributes->EAN->__toString();
                $this->data['brand']   = $item->ItemAttributes->Brand->__toString();
                $this->data['picture'] = $item->SmallImage->URL->__toString();
                $this->data['asin']    = $item->ASIN->__toString();
                $this->data['price']   = round(((int)$item->ItemAttributes->ListPrice->Amount->__toString()) / 100,2);
            }
        }else{
            $this->errorMessage[] = 'can not load xml.';
        }
    }

    /**
     * check is response xml has error key
     * if has set error message
     * @param $xml
     * @return bool
     */
    private function isResponseSuccessFull($xml){
        if(isset($xml->Items->Request->Errors)){
            $this->errorMessage[] = $xml->Items->Request->Errors->Error->Message->__toString();
        } return $this->hasError();
    }

    public function hasError(){
        return !empty($this->errorMessage);
    }

    public function getError(){
        return join(',',$this->errorMessage);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}