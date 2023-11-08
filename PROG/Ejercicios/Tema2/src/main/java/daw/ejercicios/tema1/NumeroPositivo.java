/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package daw.ejercicios.tema1;

import java.util.Scanner;

/**
 * Ejercicio para determinar si un número introducido por teclado es positivo o
 * negativo.
 * 
 * @author fcosueza
 */
public class NumeroPositivo {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        int numero;
        
        System.out.println("Introduzca un ńumero entero:");
        numero = teclado.nextInt();
        
        if (numero < 0) 
            System.out.println("El número es negativo.");
        else 
            System.out.println("El número es positivo.");
    }
}
