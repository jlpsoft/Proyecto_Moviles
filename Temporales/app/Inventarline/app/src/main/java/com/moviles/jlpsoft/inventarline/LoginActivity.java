package com.moviles.jlpsoft.inventarline;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.method.LinkMovementMethod;
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

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    private EditText editTextUsername,editTextPassword;
    private TextView textViewLinkHelp;
    private Button buttonLogIn,buttonClear;
    private RequestQueue requestQueue;
    private static final String URL = "http://192.168.1.44:80/app/user_control.php";
    private StringRequest request;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        editTextUsername=(EditText)findViewById(R.id.editTextUsername);
        editTextPassword=(EditText)findViewById(R.id.editTextPassword);
        textViewLinkHelp=(TextView)findViewById(R.id.textViewLinkHelp);
        textViewLinkHelp.setMovementMethod(LinkMovementMethod.getInstance());
        buttonLogIn=(Button)findViewById(R.id.buttonLogIn);
        buttonClear=(Button)findViewById(R.id.buttonClear);

        requestQueue = Volley.newRequestQueue(this);

        buttonLogIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            if (jsonObject.names().get(0).equals("success")) {
                                Toast.makeText(getApplicationContext(), "Éxito: " + jsonObject.getString("success"), Toast.LENGTH_SHORT).show();
                                startActivity(new Intent(getApplicationContext(), Cpanel.class));
                            } else {
                                Toast.makeText(getApplicationContext(), "Error: " + jsonObject.getString("error"), Toast.LENGTH_SHORT).show();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }


                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        HashMap<String, String> hashMap = new HashMap<String, String>();
                        hashMap.put("username", editTextUsername.getText().toString());
                        hashMap.put("password", editTextPassword.getText().toString());

                        return hashMap;
                    }
                };

                requestQueue.add(request);
            }
        });

        buttonClear.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                //borrar los editText
                editTextUsername.setText("");
                editTextUsername.invalidate();
                editTextPassword.setText("");
                editTextPassword.invalidate();
            }
        });

    }
}
