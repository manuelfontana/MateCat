<?php
/**
 * Created by PhpStorm.
 * User: fregini
 * Date: 06/03/2017
 * Time: 13:02
 */

namespace Features\Dqf\Service\Struct;


abstract class BaseRequestStruct extends BaseStruct {

    abstract function getHeaders() ;

    public function getParams() {
        return array_diff_key( $this->toArray(), $this->getHeaders() );
    }

    public function __construct( array $array_params = array() ) {
        if ( !isset( $array_params['apiKey'] ) ) {
            $array_params['apiKey'] = \INIT::$DQF_API_KEY ;
        }

        parent::__construct( $array_params );
    }


}