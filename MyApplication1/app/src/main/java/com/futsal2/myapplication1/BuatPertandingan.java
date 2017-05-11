package com.futsal2.myapplication1;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;

public class BuatPertandingan extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buat_pertandingan);
        final EditText inNolapangan = (EditText) findViewById(R.id.inNolapangan);
        final EditText inpilihtempat = (EditText) findViewById(R.id.inpilihtempat);
        final EditText inMasukkanPemain = (EditText) findViewById(R.id.inMasukkanPemain);
        final EditText inMaxPemain = (EditText) findViewById(R.id.inMaxPemain);
        final EditText inWaktumain = (EditText) findViewById(R.id.inWaktumain);
        final EditText inPemainyangada = (EditText) findViewById(R.id.inPemainyangada);
        final EditText inJammain = (EditText) findViewById(R.id.inJamMain);
        final EditText inNamaPertandingan = (EditText) findViewById(R.id.inNamaPertandingan);
        final Button bBuatPer = (Button) findViewById(R.id.bBuatper);
    }
}
