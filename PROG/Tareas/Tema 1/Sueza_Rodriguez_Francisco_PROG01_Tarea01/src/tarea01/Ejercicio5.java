package tarea01;

import java.util.Scanner; 

/**
 * 
 * Ejercicio 5.
 * 
 * En este ejercicio vamos a calcular el coste total de un número de entradas
 * para el parque acuático, teniendo en cuenta lo siguiente:
 * 
 * - Las entradas de adulto valen 15.50€ y las infantiles 10.00€
 * - Si el total a pagar es superior a 50.00€ se aplica un descuento del 5%
 * - Si el total a pagar el superior a 100.00€ se aplica un descuento del 15%
 * - El IVA de las entradas es del 21%
 * 
 * @author Francisco Sueza Rodríguez
 */

public class Ejercicio5 {
    
    public static void main(String[] args) {
        
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------
    
       /*
        * Vamos a declarar constantes tanto los precios como los límites para los
        * descuentos y el porcentaje de estos. Así como el IVA. 
        */

       // Constantes
       final double PRECIO_ADULTO = 15.00;
       final double PRECIO_INFANTIL = 10.00;
       
       final double PRECIO_DESCUENTO_MINIMO = 50.00;
       final double PRECIO_DESCUENTO_MAXIMO = 100.00;
       
       final double PORCENTAJE_DESCUENTO_MINIMO = 5.0;
       final double PORCENTAJE_DESCUENTO_MAXIMO = 15.0;
       
       final double IVA = 21.0;
        
        // Variables de entrada  
        int entradasAdulto, entradasInfantiles;
        
        // Variables de salida               
        double importeTotal, importeConDescuento, descuentoAplicado, cantidadFinal;
        String mensajeDescuento;
        
        // Variables auxiliares
        
        // Vamos a crear 2 variables para almacenar el IVA y el descuendo en euros 
        
        double descuento, iva;
        
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
    System.out.println("Ejercicio 5: ¡Vamos al parque acuático!");
    System.out.println("-----------------------------------------------");
    
    // Pedimos al usuario que introduzca tanto el radio como la altura..
    
    System.out.println("Introduce la cantidad de entradas DE ADULTO que deseas adquirir: ");
    entradasAdulto = teclado.nextInt();
    
    System.out.println("Introduce la cantidad de entradas INFANTILES que deseas adquirir: ");
    entradasInfantiles = teclado.nextInt();
    
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
    
    /*
     * Primero calculamos el importe final y comprobamos que descuento se tiene que aplicar. 
     * Como en este caso la comprobación condicional va una detras de otra, podemos anidar los 
     * operadores ternarios, para no tener que repetir código. No es una solución que me guste
     * mucho ya que el código es menos legible que con un if-then-else, pero aun no hemos dado
     * estas estructuras. 
     */
    
    
    importeTotal = (entradasAdulto * PRECIO_ADULTO) + (entradasInfantiles * PRECIO_INFANTIL);   
    descuentoAplicado = 
            importeTotal > PRECIO_DESCUENTO_MAXIMO ? PORCENTAJE_DESCUENTO_MAXIMO : 
            importeTotal > PRECIO_DESCUENTO_MINIMO ? PORCENTAJE_DESCUENTO_MINIMO : 0;
    
    // A continuación almacenamos el mensaje que se motrará con el descuento aplicado
    
    mensajeDescuento = descuentoAplicado > 0 ? 
            "Se aplicará un descuento del " + descuentoAplicado + "%." : 
            "No procede descuento en esta compra.";
    
    // Por ultimo calculamos el descuento a aplicar, el IVA, el importeConDescuento y la cantidad final.
    
    descuento = (importeTotal * descuentoAplicado) / 100;
    importeConDescuento = importeTotal - descuento;
    iva = (importeConDescuento * IVA) / 100;
    cantidadFinal = importeConDescuento + iva;
    
    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
    
    System.out.println();
    System.out.println("RESULTADO");
    System.out.println("---------");
    System.out.printf("Se comprarán %d entradas de tipo ADULTO y %d entradas de tipo INFANTIL.\n", entradasAdulto, entradasInfantiles);
    System.out.printf("El coste total de las entradas antes de aplicar descuentos es de %.2f€.\n", importeTotal);
    System.out.println(mensajeDescuento);
    System.out.printf("Tras aplicar posibles descuentos el importe total de las entradas SIN IVA es de %.2f€.\n", importeConDescuento);
    System.out.printf("El importe con IVA incluido es de %.2f€\n", cantidadFinal);
    System.out.printf("La cantidad final a pagar por el cliente es de %d€.\n", (int) cantidadFinal);   
    }  
}

