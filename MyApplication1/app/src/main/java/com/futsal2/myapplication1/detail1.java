package com.futsal2.myapplication1;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

/**
 * Created by anton on 11/05/2017.
 */

public class detail1 extends Fragment{
    public static detail1 newInstance(){
        return new detail1();
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.detail_1, container, false);

        return rootView;
    }
}

