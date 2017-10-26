package com.solodroid.androidnewsappdemo.fragments;

import android.content.res.Resources;
import android.graphics.Rect;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.view.MenuItemCompat;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.SearchView;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.solodroid.androidnewsappdemo.Config;
import com.solodroid.androidnewsappdemo.R;
import com.solodroid.androidnewsappdemo.adapters.AdapterNewsRecent;
import com.solodroid.androidnewsappdemo.json.JsonConfig;
import com.solodroid.androidnewsappdemo.json.JsonUtils;
import com.solodroid.androidnewsappdemo.models.ItemNewsList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class FragmentQueue extends Fragment {

    RecyclerView recyclerView;
    List<ItemNewsList> arrayItemNewsList;
    AdapterNewsRecent adapterNewsRecent;
    ArrayList<String> array_news, array_news_cat_name, array_cid, array_cat_id, array_cat_name, array_title, array_image, array_desc, array_date;
    String[] str_news, str_news_cat_name, str_cid, str_cat_id, str_cat_name, str_title, str_image, str_desc, str_date;
    ItemNewsList itemNewsList;
    JsonUtils util;
    int textLength = 0;
    SwipeRefreshLayout swipeRefreshLayout = null;
    ProgressBar progressBar;

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_queue, container, false);
        setHasOptionsMenu(true);

        // Using to refresh webpage when user swipes the screen

        return v;
    }

}
