package com.futsal2.myapplication1;

import android.media.Image;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v4.widget.SwipeRefreshLayout;
import android.text.Html;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.NetworkImageView;
import com.android.volley.toolbox.StringRequest;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.Server;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DetailTempat extends AppCompatActivity implements SwipeRefreshLayout.OnRefreshListener {

    NetworkImageView thum_image;
    TextView nama_tempat, tanggal, detail;
    ImageLoader imageLoader = Controller.getInstance().getmImageLoader();
    SwipeRefreshLayout swipe;
    String id_tempat;

    private static final String TAG = DetailTempat.class.getSimpleName();
    public static final String TAG_ID       = "id";
    public static final String TAG_NAMA_TEMPAT   = "nama_tempat";
    public static final String TAG_TANGGAL      = "tanggal";
    public static final String TAG_DETAIL      = "detail";
    public static final String TAG_GAMBAR   = "gambar";

    private static final String url_detail = Server.URL + "detail.php";
    String tag_json_obj = "json_obj_req";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_tempat);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        setTitle("Tempat Futsal");

        thum_image = (NetworkImageView) findViewById(R.id.gambar_tempat);
        nama_tempat = (TextView) findViewById(R.id.nama_tempat);
        tanggal = (TextView) findViewById(R.id.tgl_update);
        detail = (TextView)  findViewById(R.id.isi_tempat);
        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);

        id_tempat = getIntent().getStringExtra(TAG_ID);
        swipe.setOnRefreshListener(this);
        swipe.post(new Runnable() {
            @Override
            public void run() {
                if (!id_tempat.isEmpty()) {
                    callDetailTempat(id_tempat);
                }
            }
        }
        );
    }

    private void callDetailTempat(final String id) {
        swipe.setRefreshing(true);
        StringRequest strReq = new StringRequest(Request.Method.POST, url_detail, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Response : " + response.toString());
                swipe.setRefreshing(false);

                try {
                    JSONObject obj = new JSONObject(response);

                    String Nama_tempat = obj.getString(TAG_NAMA_TEMPAT);
                    String Gambar = obj.getString(TAG_GAMBAR);
                    String Tgl = obj.getString(TAG_TANGGAL);
                    String Isi = obj.getString(TAG_DETAIL);

                    nama_tempat.setText(Nama_tempat);
                    tanggal.setText(Tgl);
                    detail.setText(Html.fromHtml(Isi));

                    if (obj.getString(TAG_GAMBAR)!=""){
                        thum_image.setImageUrl(Gambar, imageLoader);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Tempat futsal error: " + error.getMessage());
                Toast.makeText(DetailTempat.this, error.getMessage(), Toast.LENGTH_LONG).show();
                swipe.setRefreshing(false);
            }
        }) {
            protected Map<String, String> getParams() {
                //post parameters to post url
                Map<String, String> params = new HashMap<String, String>();
                params.put("id", id);

                return params;
            }
        };
        //adding request to rquest queue
        Controller.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }
    //@Override
    public void onBaPressed() {
        finish();
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home:
                this.finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }
    @Override
    public void onRefresh() {
        callDetailTempat(id_tempat);
    }
}
