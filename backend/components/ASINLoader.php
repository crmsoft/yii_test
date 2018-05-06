<?php
/**
 * Created by PhpStorm.
 * User: ahtem
 * Date: 06.05.2018
 * Time: 18:01
 */

namespace app\components;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\Country;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\AbstractOperation;

class ASINLoader extends AbstractOperation {

    const IdType = 'ASIN';
    private $ResponseGroup = [
        'ItemAttributes',
        'Images'
    ];

    /**
     * @param $itemId
     * @return AWSEResponse
     */
    public function loadAnsi( $itemId ){

        // set request parameters
        $this->parameters['ItemId'] = $itemId;
        $this->parameters['IdType'] = self::IdType;
        $this->parameters['ResponseGroup'] = $this->ResponseGroup;

        $apaiIO = new ApaiIO(self::getConfiguration());

        return new AWSEResponse($apaiIO->runOperation($this));
    }

    /**
     * Returns the itemid
     *
     * @return string
     */
    public function getItemId()
    {
        return $this->getSingleOperationParameter('ItemId');
    }

    /**
     * Gets the name of the operation
     *
     * @see    http://docs.aws.amazon.com/AWSECommerceService/2011-08-01/DG/CHAP_OperationListAlphabetical.html
     *
     * @return string
     */
    public function getName()
    {
        return 'ItemLookup';
    }

    /**
     * set access keys...
     * @return GenericConfiguration
     */
    private function getConfiguration(){

        $conf = new GenericConfiguration();
        $client = new \GuzzleHttp\Client();
        $request = new \ApaiIO\Request\GuzzleRequest($client);
        $app = \Yii::$app;

        $request->setScheme('https');
        $conf
            ->setCountry(Country::GERMANY)
            ->setAccessKey($app->params['accessKeyId'])
            ->setSecretKey($app->params['secretKey'])
            ->setAssociateTag($app->params['associateTag'])
            ->setRequest($request);

        return $conf;
    }
}