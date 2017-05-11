package com.futsal2.futsal;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class activity_lp_password2 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lp_password2);
        final EditText massukan_kode = (EditText) findViewById(R.id.masukkan_kode);
        final Button Lanjutkan = (Button) findViewById(R.id.Lanjutkan);
        final Button batal = (Button) findViewById(R.id.batal);

        Lanjutkan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent LanjutkanIntent = new Intent(activity_lp_password2.this, LpPassword.class);
                activity_lp_password2.this.startActivity(LanjutkanIntent);


            }
        });
        batal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent batalIntent = new Intent(activity_lp_password2.this, Login.class);
                activity_lp_password2.this.startActivity(batalIntent);
            }
            });
    }
}