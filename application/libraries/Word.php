<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
include_once(APPPATH . "third_party/PhpWord/PhpWord.php");
 
class Word extends PhpWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}