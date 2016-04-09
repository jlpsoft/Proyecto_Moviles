package com.moviles.jlpsoft.inventarline;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class ListingProduct extends AppCompatActivity {
    EditText editNom;
    RequestQueue requestQueue;
    TextView textViewDetails;
    Button buttonList,buttonDelt;
    String showUrl = "http://192.168.111.1:80/app/BuscarProd.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        setContentView(R.layout.activity_listing_product);

        editNom=(EditText)findViewById(R.id.editNom);
        textViewDetails=(TextView)findViewById(R.id.textViewDetails);
        buttonList=(Button)findViewById(R.id.buttonList);
       // buttonBack=(Button)findViewById(R.id.buttonBack);
        requestQueue = Volley.newRequestQueue(getApplicationContext());

        buttonList.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                textViewDetails.setText("");
            Map<String,String> parameters  = new HashMap<String, String>();
            parameters.put("NombreProd",editNom.getText().toString());
            CustomRequest jsonObjectRequest = new CustomRequest(Request.Method.POST, showUrl,parameters, new Response.Listener<JSONObject>() {
                @Override
                public void onResponse(JSONObject response) {
                    try {

                        textViewDetails.append("----------------------------------------\n");
                        JSONArray Productos = response.getJSONArray("PRODUCTO");
                        for (int i = 0; i < Productos.length(); i++) {
                            JSONObject Producto = Productos.getJSONObject(i);
                            String code = Producto.getString("ID");
                            String name = Producto.getString("NAME");
                            String price = Producto.getString("PRICE");
                            String stock = Producto.getString("STOCK");
                            String IDFKCATEGORY = Producto.getString("IDFKCATEGORY");
                            String IDFKBRAND = Producto.getString("IDFKBRAND");
                            String IDFKSIZE = Producto.getString("IDFKSIZE");
                            String IDFKCOLOR = Producto.getString("IDFKCOLOR");
                            textViewDetails.append("Código : "+code + "\nProducto: "+ name + "\nPrecio : " + price +
                                    "\nSTOCK : "+stock + "\nIDFKCATEGORY"+IDFKCATEGORY + "\nIDFKBRAND"+IDFKBRAND +
                                    "\nIDFKSIZE"+IDFKSIZE + "\nIDFKCOLOR"+IDFKCOLOR +"\n" );
                            textViewDetails.append("----------------------------------------\n");
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    System.out.append(error.getMessage());
                }
            });
            requestQueue.add(jsonObjectRequest);
        }
    });
        /*buttonDelt.setOnClickListener(new View.OnClickListener(){

        @Override
        public void onClick(View v) {
           startActivity(new Intent().setClass(ListingProduct.this, Cpanel.class));
           finish();
        }
    });*/
    }
}
