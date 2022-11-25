/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BBDD;

/**
 *
 * @author user
 */

import Clases.Usuario;
import java.util.ArrayList;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class UsuarioDB {
    
    private Conexion db;
    
    
   
    public UsuarioDB () {
        db = new Conexion();
    }
    
    
    
    public Usuario getUsuario(String nombre){

        db.conectar();

        //Se ejecuta la consulta
        ResultSet resultUsuario = db.ejecutarSelect("SELECT * FROM usuario WHERE Nombre='" + nombre + "'");
        Usuario usuario = null;
        try {
            //Si hay resultados se obtienen los datos del usuario
            if (resultUsuario.next()) {
                //UsuarioBD nuevodao = new UsuarioBD();
                usuario = new Usuario(resultUsuario.getString("nombre"), resultUsuario.getString("contrasenya"), resultUsuario.getString("apellido1"), resultUsuario.getString("apellido2"));
                             
                db.desconectar();
                return usuario;
                
            }
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
        db.desconectar();
        
        return usuario;
    }
    public ArrayList listarUsuario(){
       ArrayList<Usuario> lista = new ArrayList<Usuario>(); 
       
       
       
       db.conectar();
         ResultSet usuarios = db.ejecutarSelect("SELECT * FROM usuario");
         try{
             
             while(usuarios.next()){
                 String nombreUsuario = usuarios.getString("nombre");
                 String contrasenaUsuario = usuarios.getString("contrasenya");
                 String apellido1 = usuarios.getString("apellido1");
                 String apellido2 = usuarios.getString("apellido2");
                 Usuario usuario = new Usuario(nombreUsuario, contrasenaUsuario, apellido1, apellido2);
                 System.out.println(nombreUsuario);
                 lista.add(usuario);
             }
             
         }catch(SQLException ex){
             Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
            return null;
         }
         db.desconectar();
         return lista;

         
         
       
    }
    
    /*
    
        --METODO ACTUALIZAR CONTRASEÑA--
    
    */
    
     public boolean actualizarContrasena(String nombre, String contrasena, String contranueva, String contra2){

        db.conectar();
        String nombreCorrecto = "";
        //Se ejecuta la consulta
        ResultSet resultUsuario = db.ejecutarSelect("SELECT * FROM usuario WHERE nombre='" + nombre + "'");
        
        
        Usuario usuario = null;
        try {
            
            if (resultUsuario.next()) {
                //UsuarioBD nuevodao = new UsuarioBD();
                usuario = new Usuario(resultUsuario.getString("nombre"), resultUsuario.getString("contrasenya"), "", "");

                //System.out.println(resultUsuario.getString("nombre"));
                System.out.println(resultUsuario.getString("contrasenya"));
                
                if(usuario.getContrasena().equals(contrasena)){
                    System.out.println("HOLA1");
                   if(contranueva.equals(contra2) && !contra2.isEmpty()){
                       //Aqui hacer update
                       System.out.println("HOLA2");
                       if(db.actualizarUsuario(nombre, contra2)){
                          return true;
                       }else{
                           return false;
                       }
                   }else{
                       return false;
                   }
                }else{
                    return false;
                }
                
            }
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
           
        }
        db.desconectar();
        
        return true;
    }
     
     /*
     
     
        -- MODIFICAR DATOS USUARIO--
     
     
     */
     
     public boolean actualizarDatos(String nombre, String apellido1, String apellido2){
         db.conectar();
         try{
             if(db.actualizarDatos(nombre, apellido1, apellido2)){
                 return true;
             }else{
                 return false;
             }
             
         }catch (Exception ex) {
            Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
           
        }
        db.desconectar();
         
         return true;
     }
     
     /*
     
     
        --ELIMINAR CUENTA DEL USUARIO--
     
     
     
     */
     public boolean eliminarCuenta(String nombre, String contrasena1, String contrasena2){
         db.conectar();
         try{
             if(db.eliminarCuenta(nombre, contrasena1, contrasena2)){
                 return true;
             }else{
                 return false;
             }
             
         }catch (Exception ex) {
            Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
           
        }
        db.desconectar();
         
         return true;
     }
     
     /*
     
     
        --REGISTRAR USUARIO--
     
     
     */
     
     public boolean registrarUsuario(String nombre, String apellido1, String apellido2, String contrasena){
         db.conectar();
         ResultSet resultUsuario = db.ejecutarSelect("SELECT * FROM usuario WHERE nombre='" + nombre + "'");
         
         try{
             
            resultUsuario.last();
           
            if ( resultUsuario.getRow() == 0 ) { //Si está vacia
                if(db.crearUsuario(nombre, apellido1, apellido2, contrasena)){
                    return true;
                }else{
                    return false;
                }
              
            } else {  
                //cambiar a la pagina de error
                return true;
            }
             
         }catch (Exception ex) {
            Logger.getLogger(UsuarioDB.class.getName()).log(Level.SEVERE, null, ex);
           
        }
        db.desconectar();
         
         return true;
         
     }

}
