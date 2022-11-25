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

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Conexion {
    
    private String USUARIO = "root";

    private String PASSWORD = "";

    private String NOMBREBD = "pepa";

    private String URL = "jdbc:mysql://localhost/"+NOMBREBD + "?useUnicode=true&characterEncoding=UTF-8";

    private final static String DRIVER = "com.mysql.jdbc.Driver";

    private Connection conn = null;

    private Statement stmt = null;
    
    public Conexion () {
    }
    
public ResultSet ejecutarSelect (String consulta) {
        try {
            stmt = conn.createStatement();
            //Se ejecuta la consulta
            ResultSet results = stmt.executeQuery(consulta);
            return results;
        } catch (SQLException sqlExcept) {
            sqlExcept.printStackTrace();
        }
        return null;
    }

    /**
     * Método que dado un String en el cual se encuentra una consulta SQL
     * realiza dicha consulta sobre la base de datos
     * @param String que representa la consulta SQL que se quiere realizar
     */
    public void ejecutarQuery (String consulta) {
        try {
            stmt = conn.createStatement();
            stmt.execute(consulta);
            stmt.close();
        } catch (SQLException sqlExcept) {
            sqlExcept.printStackTrace();
        }
    }
    
    public boolean actualizarUsuario(String nombre, String contra2){
        
       
        String query = "update usuario set contrasenya = ? where nombre = ?";
        
        try {
            PreparedStatement preparedStmt = this.conn.prepareStatement(query);
            preparedStmt.setString(1, contra2);
            preparedStmt.setString(2, nombre);
            
            // execute the java preparedstatement
            preparedStmt.executeUpdate();
            
        } catch (SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
        return true;
    }
    
    public boolean actualizarDatos(String nombre, String apellido1, String apellido2){
        
       
        String query = "update usuario set apellido1 = ?, apellido2 = ?  where nombre = ?";
        
        try {
            PreparedStatement preparedStmt = this.conn.prepareStatement(query);
            preparedStmt.setString(1, apellido1);
            preparedStmt.setString(2, apellido2);
            preparedStmt.setString(3, nombre);
            
            // execute the java preparedstatement
            preparedStmt.executeUpdate();
            
        } catch (SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
        return true;
    }
    public boolean eliminarCuenta(String nombre, String contrasena1, String contrasena2){
        
       
        String query = "DELETE FROM usuario WHERE nombre = ? AND contrasenya = ?";
        
        try {
            if(contrasena1.equals(contrasena2)){
            PreparedStatement preparedStmt = this.conn.prepareStatement(query);
            preparedStmt.setString(1, nombre);
            preparedStmt.setString(2, contrasena2);
            // execute the java preparedstatement
            preparedStmt.executeUpdate(); 
            }else{
                return false;
            }
            
            
        } catch (SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
        return true;
    }
    
    
    public boolean crearUsuario(String nombre, String apellido1, String apellido2, String contrasena){
        String query = "INSERT INTO usuario (nombre, apellido1, apellido2, contrasenya) VALUES(?,?,?,?)";
        System.out.println("ENTRA A LA CONEXION");
        try {
            
            PreparedStatement preparedStmt = this.conn.prepareStatement(query);
            preparedStmt.setString(1, nombre);
            preparedStmt.setString(2, apellido1);
            preparedStmt.setString(3, apellido2);
            preparedStmt.setString(4, contrasena);
            
            // execute the java preparedstatement
            preparedStmt.executeUpdate(); 
            
            
            
        } catch (SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
        return true;
    }
    
    
    

    /**
     * Método que realiza la conexion con la base de datos
     */
    public void conectar () {
        try {
            Class.forName(DRIVER).newInstance();
            //Get a connection
            conn = DriverManager.getConnection(URL, USUARIO, PASSWORD);
        } catch (ClassNotFoundException | IllegalAccessException | InstantiationException | SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Método que realiza la desconexión con la base de datos
     */
    public void desconectar () {
        try {
            if (stmt != null) {
                stmt.close();
            }
            if (conn != null) {
                conn.close();
            }
        } catch (SQLException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}



    
    


