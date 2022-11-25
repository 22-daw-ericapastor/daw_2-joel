/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

/**
 *
 * @author user
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import Clases.Usuario;
import BBDD.UsuarioDB;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author joelc
 */
@WebServlet(name = "ComprobarLogin", urlPatterns = {"/ComprobarLogin"})
public class ComprobarLogin extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
  
            UsuarioDB udb = new UsuarioDB();
            Usuario u = udb.getUsuario(request.getParameter("username"));
            
            
            HttpSession sesion = request.getSession(true);
            
            
            System.out.println("1 => "+u.getContrasena() +"  2 => "+request.getParameter("password"));
            
            if (u.getContrasena().equals(request.getParameter("password"))){
                // La sesión caducará a los 5min
                sesion.setMaxInactiveInterval(300);
                //Se introduce al usuario en la sesion
                sesion.setAttribute("usuario", u.getNombre());
                sesion.setAttribute("apellido1", u.getApellido1());
                sesion.setAttribute("apellido2", u.getApellido2());
                //Se introduce el rol del usuario
                sesion.setAttribute("rol", "usuario");
                //Se crea un atributo de sesion para los errores en la aplicacion
                sesion.setAttribute("validacion", "null");
                response.sendRedirect(response.encodeRedirectURL("menu.jsp"));
                //out.print("HOLA");
            }else{
                response.sendRedirect(response.encodeRedirectURL("error.jsp"));
                System.out.println("ALGO>PASA");
            }
            
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
