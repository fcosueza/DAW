package tarea02;

/**
 * Clase que implemente una máquina expendedora que permitirá a los usuario
 * seleccionar una opción de bebida y pagar por ella, devolviendo el cambio
 * adecuado y la bebida.
 * 
 * @author Francisco Javier Sueza Rodríguez
 */

import java.util.Scanner;

public class Ejercicio02 {

    public enum Bebidas {
        COCACOLA, PEPSI, AGUA, ZUMO, OTRO
    };

    public static void main(String[] args) {

        //--------------------------------------------------------
        //    Declaración de variables y constantes
        //----------------------------------------------------------
        
        // Constantes
        
        float PRECIO_REFRESCO = 1.50f;
        float PRECIO_AGUA = 1.00f;
        float PRECIO_ZUMO = 2.00f;
        
        // Variables de entrada (aquí se definen las variables que recibirán valores, si fueran necesarias)
        
        int opcionElegida;
        float dineroUsuario;
        
        // Variables auxiliares
        
        boolean opcionIncorrecta = true, salir = false;
        
        // Variables de salida (aquí se definen las variables que almacenarán resultados y se mostrarán al usuario, si fueran necesarias)
        
        float cambio, precioSeleccion = 0;
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        
        Scanner teclado = new Scanner(System.in);
        Bebidas miBebida = null;
        
        //----------------------------------------------
        //               Entrada de datos 
        //----------------------------------------------

        /* 
         * Mostramos el menú pedimos la opción por teclado. Si la opción es incorrecta
         * se muestra un mensja de error y se vuelve a pedir, hasta que la opción sea correcta.
         */
        
        do {
            
            System.out.println("Ejercicio 2: Máquina expendedora de Bebidas\n");
            System.out.println("----------------------------------------------------");
            System.out.println("Bienvenido a la Máquina Expendedora de Bebidas");
            System.out.println("1." + Bebidas.COCACOLA + " precio: " + PRECIO_REFRESCO);
            System.out.println("2." + Bebidas.PEPSI + " precio: " + PRECIO_REFRESCO);
            System.out.println("3." + Bebidas.AGUA + " precio: " + PRECIO_AGUA);
            System.out.println("4." + Bebidas.ZUMO + " precio: " + PRECIO_ZUMO);
            System.out.println("0. Salir");
            System.out.println("");
            
            System.out.println("Seleccione una opción: ");
            opcionElegida = teclado.nextInt();      
            
            if (opcionElegida < 0 || opcionElegida > 5)
                System.out.println("Opción no válida. Por favor, introduzca una bebida correcta.\n");
            else 
                opcionIncorrecta = false;
                   
        } while (opcionIncorrecta);
        
        
        //-----------------------------------------------------------
        //                 Procesamiento y  Salida de resultados 
        //-----------------------------------------------------------
        
        /*
         * Procesamos la opción seleccionad y almacenamos la bebida elegida y su
         * precio en las variables oportunas, para lo que usaremos un swtich. 
         * 
         * Podríamos haber usado un rule switch, pero como no lo hemos visto en el tema
         * no tenía claro que se pudiera emplear, pero el código hubiera quedado más 
         * claro y simple.
         */
        
        switch (opcionElegida) {
            case 1:
                miBebida = Bebidas.COCACOLA;
                precioSeleccion = PRECIO_REFRESCO;
                break;                
            case 2: 
                miBebida = Bebidas.PEPSI;
                precioSeleccion = PRECIO_REFRESCO;
                break;                
            case 3:
                miBebida = Bebidas.AGUA;
                precioSeleccion = PRECIO_AGUA;
                break;               
            case 4:
                miBebida = Bebidas.ZUMO;
                precioSeleccion = PRECIO_ZUMO;
                break;                        
            default:
                salir = true;
        }
        
        /*
         * Mostramos y procesamos la opción elegida, saliendo de la aplicación se es 
         * la opción elegida o pidiendo el dinero de la bebida elegida y calculando el 
         * cambio y si hay dinero suficiente. 
         */
        
        if (salir) {
            System.out.println("Gracias por usar la Máquina Expendedora. ¡Hasta luego!");
        } else {
            System.out.println("");
            System.out.println("Ha seleccionado: " + miBebida + ". El precio es de "+ precioSeleccion + "€.");           
            System.out.println("Ingrese la cantidad de dinero en euros: ");
            dineroUsuario = teclado.nextFloat();
            
            if (dineroUsuario < precioSeleccion)
                System.out.println("Dinero insuficiente. Su dinero será devuelto.");
            else {
                System.out.printf("\n");
                System.out.printf("Compra existosa. Su cambio es %.2f€. \n", dineroUsuario - precioSeleccion);
                System.out.printf("Disfrute de su %s.", miBebida);               
            }              
        }
    }
}

