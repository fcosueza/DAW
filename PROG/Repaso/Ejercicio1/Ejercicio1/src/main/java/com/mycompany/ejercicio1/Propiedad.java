package com.mycompany.ejercicio1;

/**
 *
 * @author fcosueza
 */
public abstract class Propiedad {

    protected static double precioMaximo = 99000000;
    protected static double precioMinimo = 900;
    protected double precio;
    protected String localidad;

    /**
     * Constructor de la clase Propiedad
     *
     * @param precio
     * @param localidad
     * @throws IllegalArgumentException
     */
    public Propiedad(double precio, String localidad) throws IllegalArgumentException {
        if (precio > Propiedad.precioMaximo || precio < Propiedad.precioMinimo || localidad == null || localidad.isEmpty()) {
            throw new IllegalArgumentException("Error: los parámetros no son correctos");

        }

        this.precio = precio;
        this.localidad = localidad;
    }

    /**
     * Método calcularPrecioConIVA
     *
     * @return
     */
    public abstract double calcularPrecioConIVA();

    public double getPrecioMaximo() {
        return precioMaximo;
    }

    public void setPrecioMaximo(float precioMaximo) {
        this.precioMaximo = precioMaximo;
    }

    public double getPrecioMinimo() {
        return precioMinimo;
    }

    public void setPrecioMinimo(float precioMinimo) {
        this.precioMinimo = precioMinimo;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) throws IllegalArgumentException {
        if (precio > Propiedad.precioMaximo || precio < Propiedad.precioMinimo) {
            throw new IllegalArgumentException("Error: el precio esta fuera de rango");
        }

        this.precio = precio;
    }

    public String getLocalidad() {
        return localidad;
    }

    public void setLocalidad(String localidad) throws IllegalArgumentException {
        if (localidad == null || localidad.isEmpty()) {
            throw new IllegalArgumentException("Error: La localidad no puede ser nula o la cadena vacía");
        }

        this.localidad = localidad;
    }

    @Override
    public String toString() {
        return "Precio: " + this.precio + " Localidad: " + this.localidad;
    }
}
