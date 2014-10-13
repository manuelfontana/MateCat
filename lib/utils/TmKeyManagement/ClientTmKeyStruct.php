<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 08/10/14
 * Time: 15.52
 */

class TmKeyManagement_ClientTmKeyStruct extends TmKeyManagement_TmKeyStruct {

    /**
     * Flag that tells wether the key is editable or not by the current user.
     * @var int 0 or 1.
     */
    public $edit;

    /**
     * This function obfuscates the key.<br />
     * A key is obfuscated by replacing all the characters except the last 4 ones with "*" characters.<br /><br />
     *
     * @param $uid
     * @return TmKeyManagement_ClientTmKeyStruct
     *
     * <b>Example</b><br />
     * 1234abcd1a2b  -->  ********1a2b
     */
    public function hideKey( $uid ){

        if( $uid != $this->uid_transl && $uid != $this->uid_rev ){
            //pre: $this->key is a string of length greater than 1

            $keyLength = strlen($this->key);
            $last4digits = substr($this->key, -4);

            $this->key = str_repeat("*", $keyLength) . $last4digits;

            $this->edit = false;

        }

        return $this;

    }

}