package com.futsal2.myapplication1;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Window;
import android.view.WindowManager;

import com.futsal2.myapplication1.SharedPreference.SharedPref;

public class Splashscreen extends AppCompatActivity {
    //set waktu splashscreen
    private static int splashInterval = 700;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        this.requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_splashscreen);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                if (SharedPref.getInstance(getApplicationContext()).isLoggedIn()) {
                    Intent iCekUser = new Intent(getApplicationContext(), Home.class);
                    startActivity(iCekUser);
                    finish();
                } else {
                    Intent iCekUser = new Intent(getApplicationContext(), Login.class);
                    startActivity(iCekUser);
                    finish();
                }
            }
            public void finish(){

            }
        }, splashInterval);
    }
}
