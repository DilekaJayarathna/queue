package com.solodroid.androidnewsappdemo.adapters;

import android.content.Context;
import android.content.Intent;
import android.graphics.Typeface;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.solodroid.androidnewsappdemo.Config;
import com.solodroid.androidnewsappdemo.R;
import com.solodroid.androidnewsappdemo.activities.ActivityNewsDetail;
import com.solodroid.androidnewsappdemo.json.JsonConfig;
import com.solodroid.androidnewsappdemo.models.ItemNewsList;
import com.squareup.picasso.Picasso;

import java.util.List;

public class AdapterNewsRecent extends RecyclerView.Adapter<AdapterNewsRecent.ViewHolder> {

    private Context context;
    private List<ItemNewsList> arrayItemNewsList;
    ItemNewsList itemNewsList;

    public class ViewHolder extends RecyclerView.ViewHolder {

        public ImageView image;
        public TextView title;
        public TextView date;
        public LinearLayout linearLayout;

        public ViewHolder(View view) {
            super(view);

            title = (TextView) view.findViewById(R.id.news_title);
            date = (TextView) view.findViewById(R.id.news_date);
            image = (ImageView) view.findViewById(R.id.news_image);
            linearLayout = (LinearLayout) view.findViewById(R.id.linearLayout);

            if (Config.ENABLE_DATE_DISPLAY) {
                date.setVisibility(View.VISIBLE);
            } else {
                date.setVisibility(View.GONE);
            }

        }

    }

    public AdapterNewsRecent(Context context, List<ItemNewsList> arrayItemNewsList) {
        this.context = context;
        this.arrayItemNewsList = arrayItemNewsList;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.lsv_item_news_list, parent, false);

        return new ViewHolder(itemView);

    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, final int position) {

        itemNewsList = arrayItemNewsList.get(position);

        Typeface font1 = Typeface.createFromAsset(context.getAssets(), "fonts/Roboto-Regular.ttf");
        Typeface font2 = Typeface.createFromAsset(context.getAssets(), "fonts/Roboto-Light.ttf");
        holder.title.setTypeface(font1);
        holder.date.setTypeface(font2);

        holder.title.setText(itemNewsList.getNewsHeading());
        holder.date.setText(itemNewsList.getNewsDate());

        Picasso.with(context).load(Config.SERVER_URL + "/upload/thumbs/" +
                itemNewsList.getNewsImage()).placeholder(R.drawable.ic_thumbnail).into(holder.image);

        holder.linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
//                itemNewsList = arrayItemNewsList.get(position);
//
//                int pos = Integer.parseInt(itemNewsList.getCatId());
//
//                Intent intent = new Intent(context, ActivityNewsDetail.class);
//                intent.putExtra("POSITION", pos);
//                JsonConfig.NEWS_ITEMID = itemNewsList.getCatId();
//
//                context.startActivity(intent);

            }
        });

    }

    @Override
    public int getItemCount() {
        return arrayItemNewsList.size();
    }

}
