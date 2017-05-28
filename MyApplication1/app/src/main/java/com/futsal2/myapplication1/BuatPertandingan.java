package com.futsal2.myapplication1;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.futsal2.myapplication1.adapter.DataBuatAdapter;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.data.DataBuat;
import com.futsal2.myapplication1.server.Server;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class BuatPertandingan extends AppCompatActivity {

    Toolbar toolbar;
    FloatingActionButton fab;
    ListView list;
    SwipeRefreshLayout swipe;
    List<DataBuat> itemList = new ArrayList<DataBuat>();
    DataBuatAdapter dataBuatAdapter;
    AlertDialog.Builder dialog;
    LayoutInflater inflater;
    View dialogView;
    EditText txt_id, txt_nama_match, txt_pilih_tempat, txt_no_lap, txt_max_pemain, txt_waktu_main, txt_jam_,main, txt_pemain_kini;
    String id_buat, nama_match, pilih_tempat, no_lap, max_pemain, waktu_main, jam_main, pemain_kini;
    private static final String TAG = BuatPertandingan.class.getSimpleName();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buat_pertandingan);

    }
}
