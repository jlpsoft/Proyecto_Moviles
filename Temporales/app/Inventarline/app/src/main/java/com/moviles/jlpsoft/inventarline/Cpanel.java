package com.moviles.jlpsoft.inventarline;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class Cpanel extends AppCompatActivity {

    Button btAdd,btModify,btListing,btDelete,btReport,btLogout;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cpanel);

        btAdd=(Button)findViewById(R.id.btAdd);
        btModify=(Button)findViewById(R.id.btModify);
        btListing=(Button)findViewById(R.id.btListing);
        btDelete=(Button)findViewById(R.id.btDelete);
        btReport=(Button)findViewById(R.id.btReport);
        //btLogout=(Button)findViewById(R.id.btLogout);

        btAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent AddProduct=new Intent(Cpanel.this,AddProduct.class);
                startActivity(AddProduct);
            }
        });
        btModify.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent ModifyProduct=new Intent(Cpanel.this,ModifyProduct.class);
                startActivity(ModifyProduct);
            }
        });
        btListing.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent ListingProduct=new Intent(Cpanel.this,ListingProduct.class);
                startActivity(ListingProduct);
            }
        });
        btDelete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent DeleteProduct=new Intent(Cpanel.this,DeleteProduct.class);
                startActivity(DeleteProduct);
            }
        });
        btReport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent GenerateReport=new Intent(Cpanel.this,GenerateReport.class);
                startActivity(GenerateReport);
            }
        });
       /* btLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent LoginActivity=new Intent(Cpanel.this,LoginActivity.class);
                startActivity(LoginActivity);
            }
        });*/
    }
}
