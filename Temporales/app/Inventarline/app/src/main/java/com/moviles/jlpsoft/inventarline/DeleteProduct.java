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

public class DeleteProduct extends AppCompatActivity {

    EditText editTextCodigo;
    Button buttondelt,btnAtras,btnMostrar;
    RequestQueue requestQueue;

    //String deletUrl="http://www.3jmovil.esy.es/app/Eliminar.php";
    String deletUrl="http://192.168.111.1:80/app/Eliminar.php";

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_delete_product);

        editTextCodigo =(EditText)findViewById(R.id.editTextCodigo);
        buttondelt =(Button)findViewById(R.id.buttondelt);
        //btnAtras = (Button)findViewById(R.id.btnAtras);
        //btnMostrar = (Button)findViewById(R.id.btnMostrar);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        buttondelt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                StringRequest request = new StringRequest(Request.Method.POST, deletUrl, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        System.out.println(response.toString());
                        Toast toast = Toast.makeText(getApplicationContext(), "Se elimino Exitosamente", Toast.LENGTH_SHORT);
                        toast.show();

                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast toast = Toast.makeText(getApplicationContext(), "No se pudo Eliminar", Toast.LENGTH_SHORT);
                        toast.show();
                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> parameters = new HashMap<String, String>();
                        parameters.put("id", editTextCodigo.getText().toString());
                        return parameters;
                    }
                };
                requestQueue.add(request);
            }
        });
    }
}
