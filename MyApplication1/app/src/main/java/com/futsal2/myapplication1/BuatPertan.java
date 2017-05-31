package com.futsal2.myapplication1;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.ProgressDialog;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.server.Server;
import com.futsal2.myapplication1.SharedPreference.SharedPref;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class BuatPertan extends AppCompatActivity {
    String tag_json_obj = "json_obj_req";

    private static final String TAG_MESSAGE = "message";


    ProgressDialog pDialog;

    private String url = Server.URL + "insert.php";

    private static final String TAG = BuatPertan.class.getSimpleName();

    private EditText nama_match, pilih_tempat, max_pemain, catatan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buat_pertan);
        final Button btnSave = (Button) findViewById(R.id.btn_create);
        nama_match = (EditText) findViewById(R.id.nama_match);
        pilih_tempat = (EditText) findViewById(R.id.pilih_tempat);
        max_pemain = (EditText) findViewById(R.id.max_pemain);

        btnSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                simpanData(nama_match.getText().toString(),
                        pilih_tempat.getText().toString(),
                        max_pemain.getText().toString());

            }

        });
    }

    private void simpanData(final String nama_match, final String pilih_tempat, final String max_pemain) {
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);
        pDialog.setMessage("simpan.....");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Simpan Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // Check for error node in json
                    if (!error) {
                        Log.e("Successfully Simpan!", jObj.toString());

                        Toast.makeText(getApplicationContext(),
                                "data telah tersimpan", Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(getApplicationContext(),
                                jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();

                    }
                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Simpan Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();

                hideDialog();

            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("nama_match", nama_match);
                params.put("pilih_tempat", pilih_tempat);
                params.put("max_pemain", max_pemain);
                return params;
            }

        };

        // Adding request to request queue
        Controller.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }
}
