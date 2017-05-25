package com.futsal2.myapplication1.adapter;

import android.app.Activity;
import android.content.Context;
import android.text.Html;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.NetworkImageView;
//import com.futsal2.myapplication1.R;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.data.TempatData;

import java.util.List;


public class DataTempatFutsal extends BaseAdapter{
    private Activity activity;
    private LayoutInflater inflater;
    private List<TempatData> tempatItems;
    ImageLoader imageLoader;

    public DataAdapter(Activity activity, List<TempatData> tempatItems) {
        this.activity = activity;
        this.tempatItems = tempatItems;
    }
    @Override
    public int getCount() {
        return tempatItems.size();
    }

    @Override
    public Object getItem(int location) {
        return tempatItems.get(location);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public  View getView(int position, View convertView, ViewGroup parent) {
        if (inflater == null)
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        if (convertView == null)
            convertView = inflater.inflate(android.R.layout.list_row_tempat, null);
        if (imageLoader == null)
            imageLoader = Controller.getInstance().getmImageLoader();

        NetworkImageView thumbNail = (NetworkImageView) convertView.findViewById(R.id.tempat_gambar);
        TextView tempat_nama = (TextView) convertView.findViewById(R.id.tempat_nama);
        TextView tempat_timestamp = (TextView) convertView.findViewById(R.id.tempat_timestamp);
        TextView isi = (TextView) convertView.findViewById(R.id.tempat_isi);

        TempatData tempat = tempatItems.get(position);

        thumbNail.setImageUrl(tempat.getGambar(), imageLoader);
        tempat_nama.setText(tempat.getNama_tempat());
        tempat_timestamp.setText(tempat.getTanggal());
        isi.setText(Html.fromHtml(tempat.getDetail()));

        return convertView;
    }

}
