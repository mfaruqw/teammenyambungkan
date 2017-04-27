package com.futsal2.futsal;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class activity_lp_password1 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lp_password1);

        final EditText etEmail = (EditText) findViewById(R.id.etEmail);
        final Button Lanjutkan = (Button) findViewById(R.id.Lanjutkan);

        Lanjutkan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent LanjutkanIntent = new Intent(activity_lp_password1.this, activity_lp_password2.class);
                activity_lp_password1.this.startActivity(LanjutkanIntent);
            }
        });
    }
}
