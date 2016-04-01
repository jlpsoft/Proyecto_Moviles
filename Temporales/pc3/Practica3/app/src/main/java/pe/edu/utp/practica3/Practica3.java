package pe.edu.utp.practica3;

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

public class Practica3 extends AppCompatActivity {

    Button btnRegistrar,btnMostrar,btnEliminar,btnModificar;
    EditText txtNombre,txtApellido,txtDNI;
    RequestQueue requestQueue;

    //String insertUrl="http://www.3jmovil.esy.es/php/Insertar.php";
    String insertUrl="http://192.168.111.1:80/php/Insertar.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        setContentView(R.layout.activity_practica3);

        txtNombre = (EditText) findViewById(R.id.txtNombre);
        txtApellido = (EditText) findViewById(R.id.textView12);
        txtDNI = (EditText) findViewById(R.id.txtDNI);
        btnRegistrar = (Button) findViewById(R.id.btnRegistrar);
        btnMostrar = (Button) findViewById(R.id.btnMostrarTodo);
        btnModificar = (Button) findViewById(R.id.btnModificar);
        btnEliminar = (Button) findViewById(R.id.btnEliminar);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        btnRegistrar.setOnClickListener(new View.OnClickListener() {
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
                        Map<String, String> parameters = new HashMap<String, String>();
                        parameters.put("nombre", txtNombre.getText().toString());
                        parameters.put("apellido", txtApellido.getText().toString());
                        parameters.put("DNI", txtDNI.getText().toString());

                        return parameters;
                    }
                };
                requestQueue.add(request);
            }

        });
        btnMostrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(),Mostrar.class));
                finish();
            }
        });

        btnEliminar.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(),Eliminar.class));
                finish();
            }
        });
        btnModificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplication(),Modificar.class));
                finish();
            }
        });
    }
}
