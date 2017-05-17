package com.futsal2.myapplication1;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONObject;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Register extends AppCompatActivity {

    ProgressDialog pDialog;
    JSONParser jsonParser = new JSONParser();
    EditText username, email, password;
    Button register;
    private static String url = "http://localhost/david/register.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        username = (EditText) findViewById(R.id.name);
        email = (EditText) findViewById(R.id.email);
        password = (EditText) findViewById(R.id.password);
        register = (Button) findViewById(R.id.register);
        final EmailValidator emailValid = new EmailValidator();

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (!emailValid.validate(email.getText().toString())){
                    Toast.makeText(Register.this, "Email tidak valid", Toast.LENGTH_LONG).show();
                    email.setText("");
                } else {
                    new registerAku().execute();
                }
            }
        });
    }
    public class registerAku extends AsyncTask<String, String, String> {
        String succes;
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(Register.this);
            pDialog.setMessage("Proses mendaftar");
            pDialog.setIndeterminate(false);
            pDialog.show();
        }
        @Override
        protected String doInBackground(String... params) {
            String strnama      = username.getText().toString();
            String stremail     = email.getText().toString();
            String strpassword  = password.getText().toString();

            List<NameValuePair> nvp = new ArrayList<NameValuePair>();
            nvp.add(new BasicNameValuePair("nama", strnama));
            nvp.add(new BasicNameValuePair("email", stremail));
            nvp.add(new BasicNameValuePair("password", strpassword));

            JSONObject json = jsonParser.makeHttpRequest(url, "POST", nvp);
            try {
                succes = json.getString("succes");
            } catch (Exception e) {
                Toast.makeText(getApplicationContext(), "error", Toast.LENGTH_LONG).show();
            }
            return null;
        }
        protected void onPostExecute(String file_url) {
            pDialog.dismiss();
            if (succes.equals("1")) {
                Toast.makeText(getApplicationContext(), "Registrasi sukses", Toast.LENGTH_LONG).show();
            } else {
                Toast.makeText(getApplicationContext(), "Registrasi gagal", Toast.LENGTH_LONG).show();
            }
        }
    }
    public class EmailValidator {
        private Pattern pattern;
        private Matcher matcher;
        private static final String EMAIL_PATTERN = "^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$";

        public EmailValidator() {
            pattern = Pattern.compile(EMAIL_PATTERN);
        }
        public boolean validate(final String hex) {
            matcher = pattern.matcher(hex);
            return matcher.matches();
        }
    }
}

