package com.futsal2.myapplication1.adapter;

import android.app.Activity;
import android.content.Context;
import android.text.Html;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Adapter;
import android.widget.BaseAdapter;
import android.widget.TextView;
import com.futsal2.myapplication1.R;
import com.futsal2.myapplication1.app.Controller;
import com.futsal2.myapplication1.data.DataBuat;
import java.util.List;

public class DataBuatAdapter extends BaseAdapter{
    private Activity activity;
    private LayoutInflater inflater;
    private List<DataBuat> items;

    public DataBuatAdapter(Activity activity, List<DataBuat> items) {
        this.activity = activity;
        this.items = items;
    }
    @Override
    public int getCount() {
        return items.size();
    }
    @Override
    public Object getItem(int position) {
        return position;
    }
    @Override
    public long getItemId(int position) {
        return position;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        if (inflater == null)
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        if (convertView == null)
            convertView = inflater.inflate(R.layout.list_row_create, null);
        TextView id_buat = (TextView) convertView.findViewById(R.id.id_buat);
        TextView nama_match = (TextView) convertView.findViewById(R.id.nama_match);
        TextView pilih_tempat = (TextView) convertView.findViewById(R.id.pilih_tempat);
        TextView no_lap = (TextView) convertView.findViewById(R.id.no_lap);
        TextView max_pemain = (TextView) convertView.findViewById(R.id.max_pemain);
        TextView waktu_main = (TextView) convertView.findViewById(R.id.waktu_main);
        TextView jam_main = (TextView) convertView.findViewById(R.id.jam_main);
        TextView pemain_kini = (TextView) convertView.findViewById(R.id.pemain_kini);

        DataBuat  dataBuat = items.get(position);

        id_buat.setText(dataBuat.getId_buat());
        nama_match.setText(dataBuat.getNama_match());
        pilih_tempat.setText(dataBuat.getPilih_tempat());
        no_lap.setText(dataBuat.getNo_lap());
        max_pemain.setText(dataBuat.getMax_pemain());
        waktu_main.setText(dataBuat.getWaktu_main());
        jam_main.setText(dataBuat.getJam_main());
        pemain_kini.setText(dataBuat.getPemain_kini());

        return convertView;
    }
}
