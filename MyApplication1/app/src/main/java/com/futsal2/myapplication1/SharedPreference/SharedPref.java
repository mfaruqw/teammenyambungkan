package com.futsal2.myapplication1.SharedPreference;

import android.content.Context;
import android.content.SharedPreferences;

/**
 * Created by USER on 31/05/2017.
 */

public class SharedPref {
    private static SharedPref mInstance;
    private static Context mCtx;
    private static final String SHARED_PREF_NAME = "futsal_sharedpref";
    private static final String KEY_USERNAME = "name_futsal";
    private static final String STATUS_LOGIN = "login_status_futsal";

    private SharedPref(Context context) {
        mCtx = context;
    }

    public static synchronized SharedPref getInstance(Context context) {
        if (mInstance == null) {
            mInstance = new SharedPref(context);
        }
        return mInstance;
    }

    public boolean Login(String username){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        editor.putString(KEY_USERNAME, username);
        editor.putString(STATUS_LOGIN, "login");

        editor.apply();
        return true;
    }

    public boolean isLoggedIn(){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        if (sharedPreferences.getString(STATUS_LOGIN, null) != null){
            //if(STATUS_LOGIN.equals("login")){
            return true;
        }
        return false;
    }

    public boolean logout(){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        return true;
    }

    public boolean setUsername(String username){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        editor.putString(KEY_USERNAME, username);

        editor.apply();
        return true;
    }

    public String getEmail(){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_USERNAME, null);
    }

}
