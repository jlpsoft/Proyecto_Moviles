package com.moviles.jlpsoft.inventarlineapp.dao;

import android.content.ContentValues;
import android.content.Context;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;

import com.moviles.jlpsoft.inventarlineapp.model.Brand;
import com.moviles.jlpsoft.inventarlineapp.model.Category;
import com.moviles.jlpsoft.inventarlineapp.model.Color;
import com.moviles.jlpsoft.inventarlineapp.model.Employee;
import com.moviles.jlpsoft.inventarlineapp.model.Product;
import com.moviles.jlpsoft.inventarlineapp.model.Size;
import com.moviles.jlpsoft.inventarlineapp.model.Transaction;

import java.util.List;

public class SQLController {
    private SQLiteDatabase database;
    private MyDbHelper dbhelper;
    private Context context;

    public SQLController(Context context) {
        this.context = context;
    }

    public SQLController open() throws SQLException {
        this.dbhelper = new MyDbHelper(this.context);
        this.database = this.dbhelper.getWritableDatabase();
        return this;
    }

    public void close(){

        this.dbhelper.close();
    }

    public void recordProduct(List<Product> list){
        for(Product product:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,product.getId());
            contentValues.put(MyDbHelper.NAME, product.getName());
            contentValues.put(MyDbHelper.PRICE,product.getPrice());
            contentValues.put(MyDbHelper.STOCK,product.getStock());
            contentValues.put(MyDbHelper.ID_FK_CATEGORY,product.getIdFkCategory());
            contentValues.put(MyDbHelper.ID_FK_SIZE,product.getIdFkSize());
            contentValues.put(MyDbHelper.ID_FK_COLOR,product.getIdFkColor());
            this.database.insert(MyDbHelper.TABLE_PRODUCT,null,contentValues);
        }
    }

    public void recordEmployee(List<Employee> list){
        for(Employee employee:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,employee.getId());
            contentValues.put(MyDbHelper.NAME, employee.getName());
            contentValues.put(MyDbHelper.LASTNAME,employee.getLastname());
            contentValues.put(MyDbHelper.EMAIL,employee.getEmail());
            contentValues.put(MyDbHelper.USERNAME,employee.getUsername());
            contentValues.put(MyDbHelper.PASSWORD,employee.getPassword());
            contentValues.put(MyDbHelper.DNI,employee.getDni());
            this.database.insert(MyDbHelper.TABLE_EMPLOYEE,null,contentValues);
        }
    }

    public void recordBrand(List<Brand> list){
        for(Brand brand:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,brand.getId());
            contentValues.put(MyDbHelper.NAME, brand.getName());
            this.database.insert(MyDbHelper.TABLE_BRAND,null,contentValues);
        }
    }

    public void recordCategory(List<Category> list){
        for(Category category:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,category.getId());
            contentValues.put(MyDbHelper.DESCRIPTION, category.getDescription());
            this.database.insert(MyDbHelper.TABLE_CATEGORY,null,contentValues);
        }
    }

    public void recordColor(List<Color> list){
        for(Color color:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,color.getId());
            contentValues.put(MyDbHelper.NAME, color.getName());
            this.database.insert(MyDbHelper.TABLE_COLOR,null,contentValues);
        }
    }

    public void recordSize(List<Size> list){
        for(Size size:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID,size.getId());
            contentValues.put(MyDbHelper.NAME, size.getName());
            this.database.insert(MyDbHelper.TABLE_SIZE,null,contentValues);
        }
    }

    public void recordTransaction(List<Transaction> list){
        for(Transaction transaction:list){
            ContentValues contentValues=new ContentValues();
            contentValues.put(MyDbHelper.ID, transaction.getId());
            contentValues.put(MyDbHelper.TYPE_TRANSACTION, transaction.getTypeTransaction());
            contentValues.put(MyDbHelper.AMOUNT_OF_UNITS, transaction.getAmountOfUnits());
            contentValues.put(MyDbHelper.ID_FK_EMPLOYEE, transaction.getIdFkEmployee());
            contentValues.put(MyDbHelper.ID_FK_PRODUCT, transaction.getIdFkProduct());
            this.database.insert(MyDbHelper.TABLE_TRANSACTION,null,contentValues);
        }
    }

}
