package pe.edu.utp.practica3;

import android.content.Intent;
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

public class Mostrar extends AppCompatActivity {

    EditText txtNombre;
    TextView txtMostrar;
    RequestQueue RequestQueue;
    Button btnMostrarTodo,btnAtras;

    //String BuscasrtUrl="http://www.3jmovil.esy.es/php/Buscar.php";
    String BuscasrtUrl="http://192.168.111.1:80/php/Buscar.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mostrar);

        txtNombre = (EditText) findViewById(R.id.txtNombre);
        txtMostrar = (TextView)findViewById(R.id.txtMostrar);
        btnMostrarTodo = (Button) findViewById(R.id.btnMostrarTodo);
        btnAtras = (Button) findViewById(R.id.btnAtras);

        RequestQueue = Volley.newRequestQueue(getApplicationContext());

        btnMostrarTodo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                txtMostrar.setText("");
                Map<String,String> parameters  = new HashMap<String, String>();
                parameters.put("nombre", txtNombre.getText().toString());
                CustomRequest jsonObjectRequest = new CustomRequest(Request.Method.POST,BuscasrtUrl,parameters, new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {

                            txtMostrar.append("----------------------------------------\n");
                            JSONArray persons = response.getJSONArray("personas");
                            for (int i = 0; i < persons.length(); i++) {
                                JSONObject person = persons.getJSONObject(i);
                                String nombre = person.getString("nombre");
                                String apellido = person.getString("apellido");
                                String DNI = person.getString("DNI");
                                txtMostrar.append("nombre : "+nombre + "\napellido : "+ apellido + "\nDNI : " + DNI + " \n");
                                txtMostrar.append("----------------------------------------\n");
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
                RequestQueue.add(jsonObjectRequest);


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
