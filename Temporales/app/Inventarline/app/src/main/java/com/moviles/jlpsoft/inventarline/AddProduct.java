package com.moviles.jlpsoft.inventarline;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class AddProduct extends AppCompatActivity {
    Button buttonAdd,buttonBack;
    EditText editTextProducto,editTextPric,editTextCantidad,editTextCat,editTextMar,editTextSize,editTextCol;
    RequestQueue requestQueue;

    String insertUrl="http://192.168.111.1:80/app/InsertarProd.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        setContentView(R.layout.activity_add_product);

        editTextProducto = (EditText) findViewById(R.id.editTextProducto);
        editTextPric = (EditText) findViewById(R.id.editTextPric);
        editTextCantidad = (EditText) findViewById(R.id.editTextCantidad);
        editTextCat = (EditText) findViewById(R.id.editTextCat);
        editTextMar = (EditText) findViewById(R.id.editTextMar);
        editTextCol = (EditText) findViewById(R.id.editTextCol);
        editTextSize = (EditText) findViewById(R.id.editTextSize);

        buttonAdd=(Button)findViewById(R.id.buttonAdd);
        buttonBack=(Button)findViewById(R.id.buttonBack);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        buttonAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                StringRequest request = new StringRequest(Request.Method.POST, insertUrl, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        System.out.println(response.toString());
                        Toast toast = Toast.makeText(getApplicationContext(), "Los Datos fueron Enviados correctamente", Toast.LENGTH_SHORT);
                        toast.show();
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast toast = Toast.makeText(getApplicationContext(), "No se pudo Insertar Elemento", Toast.LENGTH_SHORT);
                        toast.show();
                    }
                }) {

                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String,String> parameters  = new HashMap<String, String>();
                        parameters.put("name",editTextProducto.getText().toString());
                        parameters.put("price",editTextPric.getText().toString());
                        parameters.put("stock",editTextCantidad.getText().toString());
                        parameters.put("category",editTextCat.getText().toString());
                        parameters.put("Brand",editTextMar.getText().toString());
                        parameters.put("size",editTextSize.getText().toString());
                        parameters.put("color",editTextCol.getText().toString());
                        return parameters;
                    }
                };
                requestQueue.add(request);
            }

        });
        buttonBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent().setClass(AddProduct.this,Cpanel.class));
                finish();
            }
        });

    }

}

