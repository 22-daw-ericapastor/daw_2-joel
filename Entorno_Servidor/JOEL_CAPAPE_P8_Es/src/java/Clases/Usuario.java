/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Clases;

import java.io.Serializable;

/**
 *
 * @author user
 */

public class Usuario implements Serializable{
    private String nombre;
    private String contrasena;
    private String apellido1;
    private String apellido2;


    public Usuario(String nombre, String contrasena, String apellido1, String apellido2) {
        this.nombre = nombre;
        this.contrasena = contrasena;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;

        System.out.println("USUARIO CREADO");
    }

   
    
    
    
    
    public String getNombre(){
        return this.nombre;
    }
    
    
    public String getContrasena(){
        return this.contrasena;
    }
    
    public String getApellido1(){
        return this.apellido1;
    }
    public String getApellido2(){
        return this.apellido2;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setContrasena(String contrasena) {
        this.contrasena = contrasena;
    }
    
     public void setApellido1(String apellido1) {
        this.apellido1 = apellido1;
    }
      public void setApellido2(String apellido2) {
        this.apellido2 = apellido2;
    }
      

    
        
    
    public String getDatosUsuario(){
        return "nombre => "+this.nombre+" Contraseña => "+this.contrasena+" Primer Apellido => "+this.apellido1+" Segundo Apellido => "+this.apellido2;
    }
}
