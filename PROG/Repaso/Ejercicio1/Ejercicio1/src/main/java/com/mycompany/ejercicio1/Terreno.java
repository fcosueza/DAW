package com.mycompany.ejercicio1;

/**
 * Clase Terreno
 *
 * @author Francisco Sueza Rodríguez
 */
public class Terreno extends Propiedad implements Representable {

    private static final double minBase = 0.010;
    private static final double maxBase = 10.0;
    private static final double minAltura = 0.010;
    private static final double maxAltura = 10.0;

    private double base;
    private double altura;
    private double iva;

    /**
     * Constructor de la clase Terreno
     *
     * @param precio
     * @param localidad
     * @param base
     * @param altura
     * @param iva
     * @throws IllegalArgumentException
     */
    public Terreno(double precio, String localidad, double base, double altura, double iva) throws IllegalArgumentException {
        super(precio, localidad);

        if (base > Terreno.maxBase || base < Terreno.minBase || altura > Terreno.maxAltura || altura < Terreno.minAltura || iva < 0) {
            throw new IllegalArgumentException("Error: Los paramétros no son correctos");
        }

        this.base = base;
        this.altura = altura;
        this.iva = iva;
    }

    /**
     * Método calcularPrecioConIVA
     *
     * @return
     */
    @Override
    public double calcularPrecioConIVA() {
        return precio + ((precio * iva) / 100);
    }

    /**
     * Método representar
     *
     * @return
     */
    @Override
    public String representar() {
        int baseInt = (int) Math.round(this.base);
        int alturaInt = (int) Math.round(this.altura);

        String representacion = "";

        for (int i = 0; i < alturaInt; i++) {
            for (int j = 0; j < baseInt; j++) {
                if (i == 0 || i == alturaInt - 1) {
                    representacion += "* ";
                } else if (j == 0 || j == baseInt - 1) {
                    representacion += "* ";
                } else {
                    representacion += "  ";
                }

            }

            representacion += "\n";
        }

        return representacion;
    }

    /*
     * Getters y Setters
     */
    public static double getMinBase() {
        return minBase;
    }

    public static double getMaxBase() {
        return maxBase;
    }

    public static double getMinAltura() {
        return minAltura;
    }

    public static double getMaxAltura() {
        return maxAltura;
    }

    public double getExtension() {
        return base * altura;
    }

    public double getBase() {
        return base;
    }

    public void setBase(double base) throws IllegalArgumentException {
        if (base > Terreno.maxBase || base < Terreno.minBase) {
            throw new IllegalArgumentException("Error: La base esta fuera de rango");
        }

        this.base = base;
    }

    public double getAltura() {
        return altura;
    }

    public void setAltura(double altura) {
        if (altura > Terreno.maxAltura || altura < Terreno.minAltura) {
            throw new IllegalArgumentException("Error: La altura esta fuera de rango");
        }
        this.altura = altura;
    }

    public double getIva() {
        return iva;
    }

    public void setIva(double iva) {
        this.iva = iva;
    }

    @Override
    public String toString() {
        return super.toString() + " Altura: " + this.altura + "Base: " + this.base + " Precio con IVA: " + calcularPrecioConIVA();
    }

}
