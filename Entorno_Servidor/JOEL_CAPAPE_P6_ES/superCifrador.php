<?php
class Cifrados{

    function cifra($contrasena){

        $pass = 'La contraseña super Secreta';
        $method = 'aes-256-ctr';
        $iv = "contrasenaSecret";
        
        $crypText = openssl_encrypt($contrasena, $method, $pass, OPENSSL_RAW_DATA, $iv);
        $codificado = base64_encode($crypText);
        return $codificado;
        
    }

    function descrifra($contrasena){
        $decodef = base64_decode($contrasena);
        $pass = 'La contraseña super Secreta';
        $method = 'aes-256-ctr';
        $iv = "contrasenaSecret";
        $descrifrado = openssl_decrypt($decodef, $method, $pass, OPENSSL_RAW_DATA, $iv);
        return $descrifrado;
    }

    function hasea($contrasena){
    
        $hasea = password_hash($contrasena, PASSWORD_DEFAULT);
        $encode_64 = base64_encode($hasea);
        return $encode_64;
    }

    function validahash($hasea,$contrasena){
        $decode_64 = base64_decode($hasea);
        if (password_verify($contrasena, $decode_64)){
            return "Verificada";
        }
        
        }
}
?>