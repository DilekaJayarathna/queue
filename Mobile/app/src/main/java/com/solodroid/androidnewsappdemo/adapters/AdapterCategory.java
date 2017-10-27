package com.solodroid.androidnewsappdemo.adapters;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Typeface;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;
import com.solodroid.androidnewsappdemo.Config;
import com.solodroid.androidnewsappdemo.R;
import com.solodroid.androidnewsappdemo.activities.ActivityNewsListByCategory;
import com.solodroid.androidnewsappdemo.json.JsonConfig;
import com.solodroid.androidnewsappdemo.models.ItemCategory;
import com.squareup.picasso.Picasso;

import java.util.List;

public class AdapterCategory extends RecyclerView.Adapter<AdapterCategory.ViewHolder> {

    ItemCategory itemCategory;
    private Context context;
    private List<ItemCategory> arrayItemCategory;
    private InterstitialAd interstitialAd;

    public class ViewHolder extends RecyclerView.ViewHolder {

        public TextView title;
        public ImageView image;
        public LinearLayout linearLayout;

        public ViewHolder(View view) {
            super(view);

            title = (TextView) view.findViewById(R.id.category_title);
            image = (ImageView) view.findViewById(R.id.category_image);
            linearLayout = (LinearLayout) view.findViewById(R.id.linearLayout);

        }

    }

    public AdapterCategory(Context mContext, List<ItemCategory> arrayItemCategory) {
        this.context = mContext;
        this.arrayItemCategory = arrayItemCategory;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.lsv_item_category, parent, false);

        loadInterstitialAd();

        return new ViewHolder(itemView);

    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, final int position) {

        itemCategory = arrayItemCategory.get(position);

        Typeface font = Typeface.createFromAsset(context.getAssets(), "fonts/Roboto-Regular.ttf");
        holder.title.setTypeface(font);

        holder.title.setText(itemCategory.getCategoryName());

        Picasso.with(context).load(Config.SERVER_URL + "/upload/category/" +
                itemCategory.getCategoryImageurl()).placeholder(R.drawable.ic_thumbnail).into(holder.image);

        holder.linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(view.getContext());
                alertDialogBuilder.setTitle("             Doctor Details");

                alertDialogBuilder
                        .setView(R.layout.doctor_deatils)
                        .setCancelable(false)
                        .setPositiveButton("Reserve",new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog,int id) {
                                dialog.cancel();
                                //Toast.makeText(holder.getContext(), "Reserved", Toast.LENGTH_LONG).show();

                            }

                        })
                        .setNegativeButton("Close",new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                // if this button is clicked, just close
                                // the dialog box and do nothing
                                dialog.cancel();
                            }
                        });

                // create alert dialog
                AlertDialog alertDialog = alertDialogBuilder.create();

                // show it
                alertDialog.show();

//                itemCategory = arrayItemCategory.get(position);
//                int catId = itemCategory.getCategoryId();
//                JsonConfig.CATEGORY_IDD = itemCategory.getCategoryId();
//                Log.e("cat_id", "" + catId);
//                JsonConfig.CATEGORY_TITLE = itemCategory.getCategoryName();
//
//                Intent intent = new Intent(context, ActivityNewsListByCategory.class);
//                context.startActivity(intent);
//
//                showInterstitialAd();
            }
        });

    }

    @Override
    public int getItemCount() {
        return arrayItemCategory.size();
    }

    private void loadInterstitialAd() {
        Log.d("TAG", "showAd");
        interstitialAd = new InterstitialAd(context);
        interstitialAd.setAdUnitId(context.getResources().getString(R.string.admob_interstitial_id));
        interstitialAd.loadAd(new AdRequest.Builder().build());
    }

    private void showInterstitialAd() {
        if (Config.ENABLE_ADMOB_ADS) {
            if (interstitialAd.isLoaded()) {
                interstitialAd.show();
            }
        } else {
            Log.d("Fragment Category", "AdMob Interstitial is Disabled");
        }
    }
}
