
package vehiculo;

/**
 * Clase VehículoSuezaRguezFco2223
 * 
 * @author IES Aguadulce
 * @author Franciso Sueza Rodríguez
 */
public class VehiculoSuezaRguezFco2223 {

    private String nombre;
    private double precio;
    private double precioIVA;
    private int stock;

    /**
     * Constructor sin argumentos
     */
    
    public VehiculoSuezaRguezFco2223 ()
    {
    }
    
    /**
     * Constructor con 3 argumentos
     * 
     * @param nom Cadena de caracteres con el nombre del vehículo
     * @param precio Número de tipo double con el precio del vehículo
     * @param stock Número entero con la cantidad de vehículos en stock
     */
    
    public VehiculoSuezaRguezFco2223 (String nom, double precio, int stock)
    {
        this.nombre =nom;
        this.precio=precio;
        this.stock=stock;
    }
   
    /**
     * Método que asigna un numbre al vehículo
     * 
     * @param nom Cadena de texto con el nombre del vehículo
     */
    
    public void asignarNombre(String nom)
    {
        setNombre(nom);
    }
    
    /**
     * Método que devuelve el nombre del vehículo 
     *
     * @return Cadena de texto con el nombre del vehículo
     */
    
    public String obtenerNombre()
    {
        return getNombre();
    }

    /**
     * Método que devuelve la cantidad de vehículos en stock
     * 
     * @return Número entero con la cantidad de vehículos en stock
     */
    
     public int obtenerStock ()
    {
        return getStock();
    }

    /**
     * Método que realiza una compra de vehículos, sumando la cantidad a comprar
     * al stock de dicho vehículo.
     * 
     * @param cantidad Número entero con la cantidad de vehículos a comprar
     * @throws Exception Si la cantidad a comprar es menor de 0.
     */
    public void comprar(int cantidad) throws Exception
    {
        if (cantidad<0)
            throw new Exception("No se puede comprar un nº negativo de vehiculos");
        
        setStock(getStock() + cantidad);
    }

     /**
      * Método que intenta vender una cantidad determinada de vehículos
      * 
      * @param cantidad Número entero con la cantidad de vehículos a vender
      * @throws Exception Si la cantidad a vender es menor o igual que 0
      * @throws Exception Si la cantidad a vender es mayor que el stock
      */
    
    public void vender (int cantidad) throws Exception
    {
        if (cantidad <= 0)
            throw new Exception ("No se puede vender una cantidad negativa de vehiculos");
        if (obtenerStock()< cantidad)
            throw new Exception ("No se hay suficientes vehiculos para vender");
        setStock(getStock() - cantidad);
    }

    /**
     * Método generado por Netbeans, su función es una duplicidad con el método
     * asignar nombre, pero como se ha especificado si se tiene que eliminar o no,
     * lo cual debería hacerse, se va a dejar tal cual.
     * 
     * @return Cadena de caractéres con el nombre del vehículo
     */
    
    public String getNombre() {
        return nombre;
    }

    /**
     * Método que establece el nombre del vehículo, duplicado también con el 
     * método asgnarNombre, aunque no se ha eliminado.
     * 
     * @param nombre Cadena de caracteres con el nombre del vehículo
     */
    
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    /**
     * Método que devuelve el precio de un vehículo
     * 
     * @return Número de tipo double con el precio del vechículo
     */
    
    public double getPrecio() {
        return precio;
    }

    /**
     * Método que establece el precio de un vehículo
     * 
     * @param precio Número de tipo double con el precio del vechículo
     */
    
    public void setPrecio(double precio) {
        this.precio = precio;
    }

    /**
     * Método que devuelve el precio de un vehículo con el IVA incluido
     * 
     * @return Número de tipo double con el precio del vehículo con el IVA
     */
    
    public double getPrecioIVA() {
        return precioIVA;
    }

    /**
     * Método que establece el precio del vehículo con el IVA incluido
     * 
     * @param precioIVA Número de tipo double con el precio del vechículo con IVA
     */
    
    public void setPrecioIVA(double precioIVA) {
        this.precioIVA = precioIVA;
    }

    /**
     * Método que devuelve el stock del vehículo
     * 
     * @return Número entero con la cantidad e vehículos en stock
     */
    
    public int getStock() {
        return stock;
    }

    /**
     * Método que establece la cantidad de vehículos en stock
     * 
     * @param stock Número entero con la cantidad de vehículos en stock
     */
    
    public void setStock(int stock) {
        this.stock = stock;
    }
    
}  
   
    

