package com.moviles.jlpsoft.inventarlineapp.dao;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class MyDbHelper extends SQLiteOpenHelper{
    static final String DB_NAME = "Inventarline.DB";
    static final int DB_VERSION = 3;

    public static final String CREATE_TABLE_TRANSACTION="CREATE TABLE transaction(_id INTEGER PRIMARY KEY AUTOINCREMENT, id INTEGER NOT NULL, typeTransaction TEXT NOT NULL,amountOfUnits INTEGER NOT NULL,idFkEmployee INTEGER NOT NULL, idFkProduct INTEGER NOT NULL);";
    public static final String CREATE_TABLE_SIZE="CREATE TABLE size(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,name TEXT NOT NULL);";
    public static final String CREATE_TABLE_PRODUCT="CREATE TABLE product(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,name TEXT NOT NULL,price REAL NOT NULL,stock INTEGER NOT NULL,idFkCategory INTEGER NOT NULL,idFkSize INTEGER NOT NULL,idFkColor INTEGER NOT NULL);";
    public static final String CREATE_TABLE_BRAND="CREATE TABLE brand(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,name TEXT NOT NULL);";
    public static final String CREATE_TABLE_COLOR="CREATE TABLE color(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,name TEXT NOT NULL);";
    public static final String CREATE_TABLE_CATEGORY="CREATE TABLE category(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,description TEXT NOT NULL);";
    public static final String CREATE_TABLE_EMPLOYEE="CREATE TABLE employee(_id INTEGER PRIMARY KEY AUTOINCREMENT,id INTEGER NOT NULL,name TEXT NOT NULL,lastname TEXT NOT NULL,email TEXT NOT NULL,username TEXT NOT NULL,password TEXT NOT NULL,dni TEXT NOT NULL);";

    public static final String TABLE_TRANSACTION="transaction";
    public static final String TABLE_SIZE="size";
    public static final String TABLE_PRODUCT="product";
    public static final String TABLE_BRAND="brand";
    public static final String TABLE_COLOR="color";
    public static final String TABLE_CATEGORY="category";
    public static final String TABLE_EMPLOYEE="employee";

    public static final String ID="id";
    public static final String NAME="name";
    public static final String LASTNAME="lastname";
    public static final String TYPE_TRANSACTION="typeTransaction";
    public static final String AMOUNT_OF_UNITS="amountOfUnits";
    public static final String ID_FK_EMPLOYEE="idFkEmployee";
    public static final String ID_FK_PRODUCT="idFkProduct";
    public static final String PRICE="price";
    public static final String STOCK="stock";
    public static final String ID_FK_CATEGORY="idFkCategory";
    public static final String ID_FK_SIZE="idFkSize";
    public static final String ID_FK_COLOR="idFkColor";
    public static final String DESCRIPTION="description";
    public static final String EMAIL="email";
    public static final String USERNAME="username";
    public static final String PASSWORD="password";
    public static final String DNI="dni";

    public MyDbHelper(Context context){
        super(context,DB_NAME,null,DB_VERSION);
    }
    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(CREATE_TABLE_BRAND);
        db.execSQL(CREATE_TABLE_CATEGORY);
        db.execSQL(CREATE_TABLE_COLOR);
        db.execSQL(CREATE_TABLE_EMPLOYEE);
        db.execSQL(CREATE_TABLE_PRODUCT);
        db.execSQL(CREATE_TABLE_SIZE);
        db.execSQL(CREATE_TABLE_TRANSACTION);
    }

}
