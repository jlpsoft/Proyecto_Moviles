package com.moviles.jlpsoft.inventarlineapp.model;

public class Transaction {
    private int id;
    private String typeTransaction;
    private int amountOfUnits;
    private int idFkEmployee;
    private int idFkProduct;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTypeTransaction() {
        return typeTransaction;
    }

    public void setTypeTransaction(String typeTransaction) {
        this.typeTransaction = typeTransaction;
    }

    public int getAmountOfUnits() {
        return amountOfUnits;
    }

    public void setAmountOfUnits(int amountOfUnits) {
        this.amountOfUnits = amountOfUnits;
    }

    public int getIdFkEmployee() {
        return idFkEmployee;
    }

    public void setIdFkEmployee(int idFkEmployee) {
        this.idFkEmployee = idFkEmployee;
    }

    public int getIdFkProduct() {
        return idFkProduct;
    }

    public void setIdFkProduct(int idFkProduct) {
        this.idFkProduct = idFkProduct;
    }
}
