package com.moviles.jlpsoft.inventarline;

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



public class ModifyProduct extends AppCompatActivity {

    EditText editID,txtname,txtprice,txtstock,txtidFkCategory,txtidFkBrand,txtidFkSize,txtidFkColor;
    Button buttonIniciar,btnAtras;
    RequestQueue requestQueue;

    //String ModificarUrl="http://www.3jmovil.esy.es/app/Modificar.php";
    String ModificarUrl="http://192.168.111.1:80/app/Modificar.php";
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modify_product);

        editID = (EditText)findViewById(R.id.editID);
        txtname = (EditText)findViewById(R.id.txtname);
        txtprice = (EditText)findViewById(R.id.txtprice);
        txtstock = (EditText)findViewById(R.id.txtstock);
        txtidFkCategory = (EditText)findViewById(R.id.txtidFkCategory);
        txtidFkBrand = (EditText)findViewById(R.id.txtidFkBrand);
        txtidFkSize = (EditText)findViewById(R.id.txtidFkSize);
        txtidFkColor = (EditText)findViewById(R.id.txtidFkColor);
        buttonIniciar = (Button)findViewById(R.id.buttonIniciar);
        //btnAtras = (Button)findViewById(R.id.btnAtras);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        buttonIniciar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                StringRequest request = new StringRequest(Request.Method.POST, ModificarUrl, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        System.out.println(response.toString());
                        Toast toast = Toast.makeText(getApplicationContext(), "Se Modifico Exitosamente", Toast.LENGTH_SHORT);
                        toast.show();

                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast toast = Toast.makeText(getApplicationContext(), "No se pudo Modificar", Toast.LENGTH_SHORT);
                        toast.show();
                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> parameters = new HashMap<String, String>();
                        parameters.put("id", editID.getText().toString());
                        parameters.put("name", txtname.getText().toString());
                        parameters.put("price", txtprice.getText().toString());
                        parameters.put("stock", txtstock.getText().toString());
                        parameters.put("idFkCategory", txtidFkCategory.getText().toString());
                        parameters.put("idFkBrand", txtidFkBrand.getText().toString());
                        parameters.put("idFkSize", txtidFkSize.getText().toString());
                        parameters.put("idFkColor", txtidFkColor.getText().toString());
                        return parameters;
                    }
                };
                requestQueue.add(request);
            }
        });
    }
}
