package com.futsal2.myapplication1;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import java.util.ArrayList;
import java.util.HashMap;
import org.json.JSONArray;
import org.json.JSONObject;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Login extends AppCompatActivity {

    Button login, daftar, LupaPass;
    Intent a;
    EditText username, password;
    String url, success;
    SessionManager session;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        session = new SessionManager(getApplicationContext());
        Toast.makeText(getApplicationContext(), "User Login Status: " + session.isLoggedIn(), Toast.LENGTH_LONG).show();

        daftar = (Button) findViewById(R.id.daftar);
        login = (Button) findViewById(R.id.login);
        LupaPass = (Button) findViewById(R.id.LupaPass);
        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);

        //button daftar
        daftar.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View arg0) {
                Intent daftar = new Intent(Login.this, Register.class);
                startActivity(daftar);
            }
        });
        login.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v){
                url = "http://localhost/david/login.php?" + "username=" + username.getText().toString() + "&password=" + password.getText().toString();
                if (username.getText().toString().trim().length() > 0 && password.getText().toString().trim().length() > 0)
                {
                    new Masuk().execute();
                } else {
                    Toast.makeText(getApplicationContext(), "Username/Password salah gann :)", Toast.LENGTH_LONG).show();

                }
            }
        });
    }
    public class Masuk extends AsyncTask<String, String, String>
    {
        ArrayList<HashMap<String, String>> contactList = new ArrayList<HashMap<String, String>>();
        ProgressDialog pDialog;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            pDialog = new ProgressDialog(Login.this);
            pDialog.setMessage("Please wait...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }
        @Override
        protected String doInBackground(String... arg0) {
            JSONParser jParser =new JSONParser();
            JSONObject json = jParser.getJSONFromUrl(url);
            try {
                success = json.getString("succes");
                Log.e("error", "sukses=" + success);
                JSONArray hasil = json.getJSONArray("login");
                if (success.equals("1")) {
                    for (int i = 0; i<hasil.length(); i++) {
                        JSONObject c = hasil.getJSONObject(i);
                        String nama = c.getString("nama").trim();
                        String email = c.getString("email").trim();
                        session.createLoginSession(nama, email);
                        Log.e("ok", "ambil data");
                    }
                } else {
                    Log.e("error", "tidak bisa ambil data 0");
                }
            } catch (Exception e) {
                Log.e("error", "tidak bisa ambil data 1");
            }
            return null;
        }
        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            pDialog.dismiss();
            if (success.equals("1")) {
                a = new Intent(Login.this, Home.class);
                startActivity(a);
                finish();
            } else {
                Toast.makeText(getApplicationContext(), "Username/Password salah gan :)", Toast.LENGTH_LONG).show();
            }
        }
    }
}


