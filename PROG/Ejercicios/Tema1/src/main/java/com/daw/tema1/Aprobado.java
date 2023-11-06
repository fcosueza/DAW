/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.daw.tema1;

import java.util.Scanner;

/**
 *
 * @author fcosueza
 */
public class Aprobado {
    public static void main (String[] args) {
        Scanner teclado = new Scanner(System.in);
        float nota;
        
        String mensaje = "La valoracion final es: ";
        
        float rangoSuperior = 10;
        float rangoIngerior = 0;
        
        System.out.println("Introduzca la nota a valorar: ");
        nota = teclado.nextFloat();
        
        if (nota > rangoSuperior || nota < rangoIngerior)
            mensaje = "La nota introducida no es válida.";
        else
            if (nota < 5.0) 
                mensaje = mensaje + "Suspenso";
            else
                mensaje = mensaje + "Aprobado";
        
        
        System.out.println(mensaje);
    }
    
}
