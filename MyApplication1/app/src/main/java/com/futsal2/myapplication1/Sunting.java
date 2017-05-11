package com.futsal2.myapplication1;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Sunting extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sunting);
        final EditText inNama = (EditText) findViewById(R.id.inNama);
        final EditText inUsername = (EditText) findViewById(R.id.inUsername);
        final EditText inemail = (EditText) findViewById(R.id.inemail);
        final Button bSave = (Button) findViewById(R.id.bSave);

        bSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent SaveIntent = new Intent(getApplicationContext(), Home.class);
                startActivity(SaveIntent);
            }
        });

    }
}
