<?php

//Standard PHP Library
spl_autoload_register('loadClass');

function loadClass($nameClasse)
{
    //------------- default ------------------
    if (file_exists('dao/' . $nameClasse . '.php')) {
        require_once 'dao/' .$nameClasse . '.php';
    }
    if (file_exists('model/' . $nameClasse . '.php')) {
        require_once 'model/' .$nameClasse . '.php';
    }
    // officer
    if (file_exists('dao/officer/' . $nameClasse . '.php')) {
        require_once 'dao/officer/' .$nameClasse . '.php';
    }
    if (file_exists('model/officer/' . $nameClasse . '.php')) {
        require_once 'model/officer/' .$nameClasse . '.php';
    }
    // user
    if (file_exists('dao/user/' . $nameClasse . '.php')) {
        require_once 'dao/user/' .$nameClasse . '.php';
    }
    if (file_exists('model/user/' . $nameClasse . '.php')) {
        require_once 'model/user/' .$nameClasse . '.php';
    }
    // companion
    if (file_exists('dao/companion/' . $nameClasse . '.php')) {
        require_once 'dao/companion/' .$nameClasse . '.php';
    }
    if (file_exists('model/companion/' . $nameClasse . '.php')) {
        require_once 'model/companion/' .$nameClasse . '.php';
    }
    // secretary
    if (file_exists('dao/secretary/' . $nameClasse . '.php')) {
        require_once 'dao/secretary/' .$nameClasse . '.php';
    }
    if (file_exists('model/secretary/' . $nameClasse . '.php')) {
        require_once 'model/secretary/' .$nameClasse . '.php';
    }
    // missed
    if (file_exists('dao/missed/' . $nameClasse . '.php')) {
        require_once 'dao/missed/' .$nameClasse . '.php';
    }
    if (file_exists('model/missed/' . $nameClasse . '.php')) {
        require_once 'model/missed/' .$nameClasse . '.php';
    }

    // ------------- one back -------------
    if (file_exists('../dao/' . $nameClasse . '.php')) {
        require_once '../dao/' .$nameClasse . '.php';
    }
    if (file_exists('../model/' . $nameClasse . '.php')) {
        require_once '../model/' .$nameClasse . '.php';
    }
    // officer
    if (file_exists('../dao/officer/' . $nameClasse . '.php')) {
        require_once '../dao/officer/' .$nameClasse . '.php';
    }
    if (file_exists('../model/officer/' . $nameClasse . '.php')) {
        require_once '../model/officer/' .$nameClasse . '.php';
    }
    // user
    if (file_exists('../dao/user/' . $nameClasse . '.php')) {
        require_once '../dao/user/' .$nameClasse . '.php';
    }
    if (file_exists('../model/user/' . $nameClasse . '.php')) {
        require_once '../model/user/' .$nameClasse . '.php';
    }
    // companion
    if (file_exists('../dao/companion/' . $nameClasse . '.php')) {
        require_once '../dao/companion/' .$nameClasse . '.php';
    }
    if (file_exists('../model/companion/' . $nameClasse . '.php')) {
        require_once '../model/companion/' .$nameClasse . '.php';
    }
    // secretary
    if (file_exists('../dao/secretary/' . $nameClasse . '.php')) {
        require_once '../dao/secretary/' .$nameClasse . '.php';
    }
    if (file_exists('../model/secretary/' . $nameClasse . '.php')) {
        require_once '../model/secretary/' .$nameClasse . '.php';
    }
    // missed
    if (file_exists('../dao/missed/' . $nameClasse . '.php')) {
        require_once '../dao/missed/' .$nameClasse . '.php';
    }
    if (file_exists('../model/missed/' . $nameClasse . '.php')) {
        require_once '../model/missed/' .$nameClasse . '.php';
    }
    if(file_exists('../dao/pista/'.$nameClasse.'.php')){
        require_once '../dao/pista/'.$nameClasse.'.php';
    }

    //---------------- two back ---------------
    if (file_exists('../../dao/' . $nameClasse . '.php')) {
        require_once '../../dao/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/' . $nameClasse . '.php')) {
        require_once '../../model/' .$nameClasse . '.php';
    }
    // officer
    if (file_exists('../../dao/officer/' . $nameClasse . '.php')) {
        require_once '../../dao/officer/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/officer/' . $nameClasse . '.php')) {
        require_once '../../model/officer/' .$nameClasse . '.php';
    }
    // user
    if (file_exists('../../dao/user/' . $nameClasse . '.php')) {
        require_once '../../dao/user/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/user/' . $nameClasse . '.php')) {
        require_once '../../model/user/' .$nameClasse . '.php';
    }
    // companion
    if (file_exists('../../dao/companion/' . $nameClasse . '.php')) {
        require_once '../../dao/companion/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/companion/' . $nameClasse . '.php')) {
        require_once '../../model/companion/' .$nameClasse . '.php';
    }
    // secretary
    if (file_exists('../../dao/secretary/' . $nameClasse . '.php')) {
        require_once '../../dao/secretary/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/secretary/' . $nameClasse . '.php')) {
        require_once '../../model/secretary/' .$nameClasse . '.php';
    }
    // missed
    if (file_exists('../../dao/missed/' . $nameClasse . '.php')) {
        require_once '../../dao/missed/' .$nameClasse . '.php';
    }
    if (file_exists('../../model/missed/' . $nameClasse . '.php')) {
        require_once '../../model/missed/' .$nameClasse . '.php';
    }
    if(file_exists('../../dao/pista/'.$nameClasse.'.php')){
        require_once '../../dao/pista/'.$nameClasse.'.php';
    }
    
    

}
?>