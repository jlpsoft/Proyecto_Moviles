package pe.edu.utp.practica3;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.Editable;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Modificar extends AppCompatActivity {

    EditText txtDNI,txtNombre,txtApellido;
    Button btnModificar,btnAtras;
    RequestQueue requestQueue;

    //String ModificarUrl="www.3jmovil.esy.es/php/Modificar.php";
    String ModificartUrl="http://192.168.111.1:80/php/Modificar.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar);

        txtDNI = (EditText)findViewById(R.id.txtDNI);
        txtApellido = (EditText)findViewById(R.id.txtApellido);
        txtNombre = (EditText)findViewById(R.id.txtNombre);
        btnModificar = (Button)findViewById(R.id.btnModificar);
        btnAtras = (Button)findViewById(R.id.btnAtras);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        btnModificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                StringRequest request = new StringRequest(Request.Method.POST, ModificartUrl, new Response.Listener<String>() {
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
                        parameters.put("DNI", txtDNI.getText().toString());
                        parameters.put("nombre", txtNombre.getText().toString());
                        parameters.put("apellido", txtApellido.getText().toString());
                        return parameters;
                    }
                };
                requestQueue.add(request);
            }
        });

                btnAtras.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        startActivity(new Intent(getApplicationContext(), Practica3.class));
                        finish();
                    }
                });
        }
    }