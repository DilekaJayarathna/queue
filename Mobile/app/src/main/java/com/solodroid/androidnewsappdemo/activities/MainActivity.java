package com.solodroid.androidnewsappdemo.activities;

import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.onesignal.OneSignal;
import com.solodroid.androidnewsappdemo.Config;
import com.solodroid.androidnewsappdemo.R;
import com.solodroid.androidnewsappdemo.fragments.FragmentAbout;
import com.solodroid.androidnewsappdemo.fragments.FragmentFavorite;
import com.solodroid.androidnewsappdemo.fragments.TabFragment;
import com.startapp.android.publish.Ad;
import com.startapp.android.publish.AdEventListener;
import com.startapp.android.publish.StartAppAd;
import com.startapp.android.publish.StartAppSDK;

public class MainActivity extends AppCompatActivity {

    Toolbar toolbar;
    DrawerLayout mDrawerLayout;
    NavigationView mNavigationView;
    FragmentManager mFragmentManager;
    FragmentTransaction mFragmentTransaction;
    private AdView adView;
    private StartAppAd startAppAd = new StartAppAd(this);


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        StartAppSDK.init(this, getResources().getString(R.string.startapp_app_id), false);

        setContentView(R.layout.activity_main);

        if (Config.ENABLE_RTL_MODE) {
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.JELLY_BEAN_MR1) {
                getWindow().getDecorView().setLayoutDirection(View.LAYOUT_DIRECTION_RTL);
            }
        } else {
            Log.d("MainActivity", "Working in Normal Mode, RTL Mode is Disabled");
        }

        OneSignal.idsAvailable(new OneSignal.IdsAvailableHandler() {
            @Override
            public void idsAvailable(String userId, String registrationId) {
                String text = "OneSignal UserID:\n" + userId + "\n\n";

                if (registrationId != null)
                    text += "Google Registration Id:\n" + registrationId;
                else
                    text += "Google Registration Id:\nCould not subscribe for push";

                TextView textView = (TextView)findViewById(R.id.debug_view);
                textView.setText(text);
            }
        });

        toolbar = (Toolbar) findViewById(R.id.toolbar);
        if (toolbar != null) {
            setSupportActionBar(toolbar);
        }

        loadAdMobBannerAd();

        loadStartAppWhenAppLaunch();

        mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
        mNavigationView = (NavigationView) findViewById(R.id.main_drawer);

        mFragmentManager = getSupportFragmentManager();
        mFragmentTransaction = mFragmentManager.beginTransaction();
        mFragmentTransaction.replace(R.id.frame_container, new TabFragment()).commit();

        mNavigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(MenuItem menuItem) {

                menuItem.setChecked(true);
                mDrawerLayout.closeDrawers();
                //setTitle(menuItem.getTitle());

                if (menuItem.getItemId() == R.id.drawer_home) {
                    FragmentTransaction fragmentTransaction = mFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.frame_container, new TabFragment()).commit();
                }

                if (menuItem.getItemId() == R.id.drawer_favorite) {
                    FragmentTransaction fragmentTransaction = mFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.frame_container, new FragmentFavorite()).commit();
                }

                if (menuItem.getItemId() == R.id.drawer_rate) {
                    final String appName = getPackageName();
                    try {
                        startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("market://details?id=" + appName)));
                    } catch (ActivityNotFoundException anfe) {
                        startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("http://play.google.com/store/apps/details?id=" + appName)));
                    }
                }

                if (menuItem.getItemId() == R.id.drawer_more) {
                    startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(getString(R.string.play_more_apps))));
                }

                if (menuItem.getItemId() == R.id.drawer_about) {
                    FragmentTransaction fragmentTransaction = mFragmentManager.beginTransaction();
                    fragmentTransaction.replace(R.id.frame_container, new FragmentAbout()).commit();
                }

                return false;
            }

        });

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        ActionBarDrawerToggle mDrawerToggle = new ActionBarDrawerToggle(this, mDrawerLayout, toolbar, R.string.drawer_open, R.string.drawer_close);

        mDrawerLayout.addDrawerListener(mDrawerToggle);

        mDrawerToggle.syncState();

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.main, menu);

        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem menuItem) {
        switch (menuItem.getItemId()) {

            case android.R.id.home:
                onBackPressed();
                return true;

            default:
                return super.onOptionsItemSelected(menuItem);
        }
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            loadStartAppOnBackPressed();
            super.onBackPressed();
        }
    }

    @Override
    public void onStart() {
        super.onStart();
    }

    @Override
    public void onStop() {
        super.onStop();
    }

    @Override
    protected void onPause() {
        adViewOnPause();
        super.onPause();
    }

    @Override
    protected void onResume() {
        super.onResume();
        adViewOnResume();
    }

    @Override
    protected void onDestroy() {
        adViewOnDestroy();
        super.onDestroy();
    }

    private void loadStartAppWhenAppLaunch() {
        if (Config.ENABLE_STARTAPP_ADS) {
            startAppAd.loadAd(new AdEventListener() {
                @Override
                public void onReceiveAd(Ad arg0) {
                    startAppAd.showAd();
                    startAppAd.loadAd();
                }

                @Override
                public void onFailedToReceiveAd(Ad arg0) {
                }
            });
        } else {
            Log.d("MainActivity", "StartApp When App Launch is Disabled");
        }
    }

    private void loadStartAppOnBackPressed() {
        if (Config.ENABLE_STARTAPP_ADS) {
            StartAppAd.onBackPressed(this);
        } else {
            Log.d("MainActivity", "StartApp onBackPressed is Disabled");
        }
    }

    private void loadAdMobBannerAd() {
        if (Config.ENABLE_ADMOB_ADS) {
            adView = (AdView) findViewById(R.id.adView);
            adView.loadAd(new AdRequest.Builder().build());
            adView.setAdListener(new AdListener() {

                @Override
                public void onAdClosed() {
                }

                @Override
                public void onAdFailedToLoad(int error) {
                    adView.setVisibility(View.GONE);
                }

                @Override
                public void onAdLeftApplication() {
                }

                @Override
                public void onAdOpened() {
                }

                @Override
                public void onAdLoaded() {
                    adView.setVisibility(View.VISIBLE);
                }
            });
            Log.d("MainActivity", "AdMob Banner is Enabled");

        } else {
            Log.d("MainActivity", "AdMob Banner is Disabled");
        }
    }

    private void adViewOnPause() {
        if (Config.ENABLE_ADMOB_ADS) {
            adView.pause();
        } else {
            Log.d("MainActivity", "adView onPause is Disabled");
        }
    }

    private void adViewOnResume() {
        if (Config.ENABLE_ADMOB_ADS) {
            adView.resume();
        } else {
            Log.d("MainActivity", "adView onResume is Disabled");
        }
    }

    private void adViewOnDestroy() {
        if (Config.ENABLE_ADMOB_ADS) {
            adView.destroy();
        } else {
            Log.d("MainActivity", "adView onDestroy is Disabled");
        }
    }

}