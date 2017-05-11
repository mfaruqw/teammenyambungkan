package com.futsal2.myapplication1;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class LpPassword extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lp_password);
        final EditText password_lama = (EditText) findViewById(R.id.password_lama);
        final EditText password_baru = (EditText) findViewById(R.id.password_baru);
        final Button GantiPassword = (Button) findViewById(R.id.GantiPassword);

        GantiPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent GantiPasswordIntent = new Intent(LpPassword.this, LpPassword1.class);
                LpPassword.this.startActivity(GantiPasswordIntent);

            }
        });
    }
}
