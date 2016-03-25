package com.moviles.jlpsoft.inventarlineapp.model;

public class Product {
    private int id;
    private String name;
    private double price;
    private int stock;
    private int idFkCategory;
    private int idFkSize;
    private int idFkColor;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public int getStock() {
        return stock;
    }

    public void setStock(int stock) {
        this.stock = stock;
    }

    public int getIdFkCategory() {
        return idFkCategory;
    }

    public void setIdFkCategory(int idFkCategory) {
        this.idFkCategory = idFkCategory;
    }

    public int getIdFkSize() {
        return idFkSize;
    }

    public void setIdFkSize(int idFkSize) {
        this.idFkSize = idFkSize;
    }

    public int getIdFkColor() {
        return idFkColor;
    }

    public void setIdFkColor(int idFkColor) {
        this.idFkColor = idFkColor;
    }
}
