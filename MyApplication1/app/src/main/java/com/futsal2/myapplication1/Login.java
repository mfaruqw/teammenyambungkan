package com.futsal2.myapplication1;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Login extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        final EditText etUsername = (EditText) findViewById(R.id.etUsername);
        final EditText etPassword = (EditText) findViewById(R.id.etPassword);
        final Button bSignIn = (Button) findViewById(R.id.bSignIn);
        final TextView RegisterLink = (TextView) findViewById(R.id.tvRegisterLink);
        final TextView PasswordLink = (TextView) findViewById(R.id.tvlupapassLink);


        bSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent SignInIntent = new Intent(getApplicationContext(), Home.class);
                startActivity(SignInIntent);
            }
        });

        RegisterLink.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent RegisterInIntent = new Intent(getApplicationContext(), Register.class);
                startActivity(RegisterInIntent);
            }
        });
        PasswordLink.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent LpPassInIntent = new Intent(getApplicationContext(), LpPassword.class);
                startActivity(LpPassInIntent);
            }
        });

    }
}

