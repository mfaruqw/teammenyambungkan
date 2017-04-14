package com.futsal2.futsal;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.os.Handler;
import android.view.Window;
import android.view.WindowManager;

public class Splashscreen extends AppCompatActivity {
    //set waktu splashscreen
    private static int splashInterval = 2000;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        this.requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_splashscreen);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                Intent i = new Intent(Splashscreen.this, LoginActivity.class);
                startActivity(i);//menghubungkan activity splashscreen ke login

                //jeda selesai
                this.finish();
            }
            public void finish(){

            }
        }, splashInterval);

    }
}
