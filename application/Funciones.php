<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class Funciones
{
    public static function invertirFecha($fecha, $char, $newChar)
    {
        $datos = explode($char, $fecha);
        $fechaFinal = $datos[2].$newChar.$datos[1].$newChar.$datos[0];
        return $fechaFinal;
    }
    
    
    public static function sumFecha($fIni, $dias=0, $meses=0, $years=0)
    {
        $fechaExp= explode('/', $fIni);
        $newDate= mktime(0, 0, 0, $fechaExp[1]+$meses, $fechaExp[0]+$dias, $fechaExp[2]+$years);
        $fechaEnd= date("d/m/Y", $newDate);
        
        return $fechaEnd;
        
        /*php 5.3 
        //P --Para iniciar los parametros de Fecah;
        //7Y --Setear 7 a�os
        //5M --Setear 5 meses
        //4D --Setear 4 dias
        //T -- para iniciar parametros de Hora
        //4H --Setear 4 horas
        //3M --Setear 3 minutos
        //2S --Setear 2 segundos
        //$fecha->add(new DateInterval('P7Y5M4DT4H3M2S'));
        $fecha = new DateTime($fIni);
        $fecha->add(new DateInterval('P'.$years.'Y'.$meses.'M'.$dias.'D'));
        echo $fecha->format('Y-m-d'); */
    }
    
    
    public static function getBrowser()
    { 
        $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent))
        {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        } 
        elseif(preg_match('/Chrome/i',$u_agent)) 
        { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        } 
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 
        elseif(preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        } 

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }
}

?>