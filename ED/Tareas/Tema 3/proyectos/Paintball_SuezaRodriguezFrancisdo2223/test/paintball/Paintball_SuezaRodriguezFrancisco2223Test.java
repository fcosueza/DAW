package paintball;

import org.junit.Test;
import junit.framework.TestCase; 
import static org.junit.Assert.*;

/**
 * Test para probar el método descargar de la clase Paintball. Se ha eliminado
 * el resto de test que ha creado netbeans por defecto, ya que no se requieren tests
 * para otras clases en el enunciado de la tarea.
 * 
 * @author Francisco Javier Sueza Rodríguez
 */

public class Paintball_SuezaRodriguezFrancisco2223Test extends TestCase { 
    public Paintball_SuezaRodriguezFrancisco2223Test(String testName) {
        super(testName);
    }
    
    @Override
    protected void setUp() throws Exception {
        super.setUp();
    }
    
    @Override
    protected void tearDown() throws Exception {
        super.tearDown();
    }
    
    /**
     * Tests para comprobar os valores límite sobre el método Descargar. 
     */
    
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar 0 
     * municiones, algo que no debería permitir el método.
     * 
     * @result El metodo no debe permitir descargar 0 municiones, lanzando una excepcion.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarCero() throws Exception {
        System.out.println("Test de prueba para intentar descargar 0 municiones");
       
        int municion = 0;
        int municionMaxima = 30;
        int municionCargada = 10;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = 
                new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             fail("No se pueden descargar 0 municiones.");      
             
        } catch(Exception e) {
             System.out.println(e);
             assertTrue(paintball.consultar_municion_cargada() == municionCargada);            
        }       
    }
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar 1
     * municiones, algo que debería permitir el metodo, restando esta cantidad
     * a la munición cargada
     * 
     * @result El metodo debe permitir descargar 1 munición y restar 1 a la munición cargada.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarUno() throws Exception {
        System.out.println("Test de prueba para intentar descargar 1 municiones");
       
        int municion = 1;
        int municionMaxima = 30;
        int municionCargada = 10;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = 
                new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             assertTrue(paintball.consultar_municion_cargada() == municionCargada - municion);  
             
        } catch(Exception e) {
             fail("Se ha producido una excepción inesperada.");           
        }       
    }
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar 2
     * municiones, algo que debería permitir el metodo, restando esta cantidad
     * a la munición cargada
     * 
     * @result El metodo debe permitir descargar 1 munición y restar 2 a la munición cargada.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarDos() throws Exception {
        System.out.println("Test de prueba para intentar descargar 2 municiones");
       
        int municion = 2;
        int municionMaxima = 30;
        int municionCargada = 10;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = 
                new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             assertTrue(paintball.consultar_municion_cargada() == municionCargada - municion);  
             
        } catch(Exception e) {
             fail("Se ha producido una excepción inesperada.");           
        }       
    }
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar (municionCargada - 1)
     * municiones, algo que debería permitir el metodo, restando esta cantidad a la munición cargada
     * quedando por tanto solo 1 munición en el cargador.
     * 
     * @result El metodo debe permitir descargar (municionCargada - 1) municiones y restar esta cantidad
     *         dejando 1 municion en el cargador.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarCargadaMenos() throws Exception {
        System.out.println("Test de prueba para intentar descargar (municion cargada - 1) municiones");
       
        int municionMaxima = 30;
        int municionCargada = 10;
        int municion = municionCargada - 1;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = 
                new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             assertTrue(paintball.consultar_municion_cargada() == 1);  
             
        } catch(Exception e) {
             fail("Se ha producido una excepción inesperada.");           
        }       
    }
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar (municionCargada)
     * municiones, algo que debería permitir el metodo, restando esta cantidad a la munición cargada
     * quedando por tanto solo 1 munición en el cargador.
     * 
     * @result El metodo debe permitir descargar (municionCargada) municiones y restar esta cantidad
     *         dejando 0 municiones en el cargador.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarCargada() throws Exception {
        System.out.println("Test de prueba para intentar descargar \"municion cargada\" municiones");
       
        int municionMaxima = 30;
        int municionCargada = 10;
        int municion = municionCargada;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = 
                new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             assertTrue(paintball.consultar_municion_cargada() == 0);  
             
        } catch(Exception e) {
             fail("Se ha producido una excepción inesperada.");           
        }       
    }
    
    /**
     * Test para el método Descargar. En esta prueba se van intentar descargar (municionCargada + 1)
     * municiones, algo que no debería permitir, lanzando una excepción.
     * 
     * @result El metodo no debe permitir descargar más munición de la que hay, lanzando un excepción..
     * @throws java.lang.Exception
     */
    
    @Test
    public void testDescargarCargadaMas() throws Exception {
        System.out.println("Test de prueba para intentar descargar (municion cargada + 1) municiones");
       
        int municionMaxima = 30;
        int municionCargada = 10;
        int municion = municionCargada + 1;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             fail("No se pueden descargar más municiones de las que hay cargadas.");
             
        } catch(Exception e) {
            System.out.println(e);
            assertTrue(paintball.consultar_municion_cargada() == municionCargada);                        
        }       
    }
    
    /**
     * Test para probar valores no validos fuera de los valores límite.
     */
    
     /**
     * Test para el método Descargar.  Se va a probar un valor no valido negativo.
     * 
     * @result El metodo no debe permitir descargar un número negativo de munición.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testNoValidoNegativo() throws Exception {
        System.out.println("Test de prueba para intentar descargar -100 municiones.");
       
        int municionMaxima = 30;
        int municionCargada = 10;
        int municion = -500;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             fail("No se pueden descargar un número negativo de municiones.");
             
        } catch(Exception e) {
            System.out.println(e);
            assertTrue(paintball.consultar_municion_cargada() == municionCargada);                        
        }       
    }
    
         /**
     * Test para el método Descargar.  Se va a probar un valor no valido positivo, que sera 
     * muy superior a la cantidad de munición cargada.
     * 
     * @result El metodo no debe permitir descargar un número positivo no valido.
     * @throws java.lang.Exception
     */
    
    @Test
    public void testNoValidoPositivo() throws Exception {
        System.out.println("Test de prueba para intentar descargar (municion cargada + 500) municiones");
       
        int municionMaxima = 30;
        int municionCargada = 10;
        int municion = municionCargada + 500;
        
        Paintball_SuezaRodriguezFrancisco2223 paintball = new Paintball_SuezaRodriguezFrancisco2223(municionMaxima, municionCargada);
       
        try {
             paintball.descargar(municion);
             fail("No se pueden descargar más munición de la que hay cargada");
             
        } catch(Exception e) {
            System.out.println(e);
            assertTrue(paintball.consultar_municion_cargada() == municionCargada);                        
        }       
    }
}
