package com.futsal2.myapplication1;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.os.Handler;
import android.support.v4.widget.SwipeRefreshLayout;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AbsListView;
import android.widget.AdapterView;
import android.widget.ListView;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import com.futsal2.myapplication1.adapter.DataTempatFutsal;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.data.TempatData;
import com.futsal2.myapplication1.server.Server;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class TempatFutsal extends AppCompatActivity implements SwipeRefreshLayout.OnRefreshListener{
    ListView list;
    SwipeRefreshLayout swipe;
    List<TempatData> tempatList = new ArrayList<TempatData>();

    private static final String TAG = TempatFutsal.class.getSimpleName();
    private static String url_list = Server.URL + "tempat.php?offset=";
    private int offset = 0;
    int no;
    DataTempatFutsal dataTempatFutsal;
    public static final String TAG_NO       = "no";
    public static final String TAG_ID       = "id";
    public static final String TAG_NAMA_TEMPAT   = "nama_tempat";
    public static final String TAG_TANGGAL      = "tanggal";
    public static final String TAG_DETAIL      = "detail";
    public static final String TAG_GAMBAR   = "gambar";

    Handler handler;
    Runnable runnable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tempat_futsal);

        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);
        list = (ListView) findViewById(R.id.list_tempat);
        tempatList.clear();

        list.setOnItemClickListener(new AdapterView.OnItemClickListener(){
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(TempatFutsal.this, DetailTempat.class);
                intent.putExtra(TAG_ID, tempatList.get(position).getId());
                startActivity(intent);
            }
        });

        dataTempatFutsal = new DataTempatFutsal(TempatFutsal.this, tempatList);
        list.setAdapter(dataTempatFutsal);
        swipe.setOnRefreshListener(this);
        swipe.post(new Runnable() {
            @Override
            public void run() {
                swipe.setRefreshing(true);
                tempatList.clear();
                dataTempatFutsal.notifyDataSetChanged();
                callTempat(0);
            }
        }
        );

        list.setOnScrollListener(new AbsListView.OnScrollListener(){
            private int currentVisibleItemCount;
            private int currentScrollState;
            private int currentFirstVisibleItem;
            private int totalItem;

            @Override
            public void onScrollStateChanged(AbsListView view, int scrollState) {
                this.currentScrollState = scrollState;
                this.isScrollCompleted();
            }
            @Override
            public void onScroll(AbsListView view, int firstVisibleItem, int visibleItemCount, int totalItemCount) {
                this.currentFirstVisibleItem = firstVisibleItem;
                this.currentVisibleItemCount = visibleItemCount;
                this.totalItem = totalItemCount;
            }
            private void isScrollCompleted() {
                if (totalItem - currentFirstVisibleItem == currentVisibleItemCount && this.currentScrollState == SCROLL_STATE_IDLE) {
                    swipe.setRefreshing(true);
                    handler = new Handler();
                    runnable = new Runnable() {
                        public void run() {
                            callTempat(offset);
                        }
                    };
                    handler.postDelayed(runnable, 3000);
                }
            }
        });
    }
    //@Override
    public void onRefresh() {
        tempatList.clear();
        dataTempatFutsal.notifyDataSetChanged();
        callTempat(0);
    }

    private void callTempat(int page) {
        swipe.setRefreshing(true);
        //create volley requst obj
        JsonArrayRequest arrReq = new JsonArrayRequest(url_list + page, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                Log.d(TAG, response.toString());
                if (response.length() > 0) {
                    //parsing data json
                    for (int i = 0; i < response.length(); i++) {
                        try{
                        JSONObject obj = response.getJSONObject(i);
                        TempatData tempat = new TempatData();
                        no = obj.getInt(TAG_NO);
                        tempat.setId(obj.getString(TAG_ID));
                        tempat.setNama_tempat(obj.getString(TAG_NAMA_TEMPAT));

                        if (obj.getString(TAG_GAMBAR) != "") {
                            tempat.setGambar(obj.getString(TAG_GAMBAR));
                        }
                        tempat.setDatetime(obj.getString(TAG_TANGGAL));
                        tempat.setDetail(obj.getString(TAG_DETAIL));
                        //adding tempat to array tempat
                        tempatList.add(tempat);
                        if (no > offset)
                            offset = no;

                        Log.d(TAG, "offset" + offset);
                    }  catch(JSONException e){
                        Log.d(TAG, "JSON Parsing data error: " + e.getMessage());
                    }
                    //notifying list adapter about data shanges
                    //so that it renders the list view qith updated data
                    dataTempatFutsal.notifyDataSetChanged();
                }
            }
            swipe.setRefreshing(false);
        }
    }, new Response.ErrorListener() {
        @Override
        public void onErrorResponse(VolleyError error){
            VolleyLog.d(TAG, "Error: " + error.getMessage());
            swipe.setRefreshing(false);
        }
        });

    // Adding request to request queue
       Controller.getInstance().addToRequestQueue(arrReq);
}

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_detail, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

}
