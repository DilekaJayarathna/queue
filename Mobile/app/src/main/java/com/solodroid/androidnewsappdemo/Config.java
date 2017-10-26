package com.solodroid.androidnewsappdemo;

import java.io.Serializable;

public class Config implements Serializable {

    private static final long serialVersionUID = 1L;

    //your admin panel url
    public static final String SERVER_URL = "http://dimasword.com/demo/news";

    //set true for enable ads, set false for disable ads
    public static final boolean ENABLE_STARTAPP_ADS = false;
    public static final boolean ENABLE_ADMOB_ADS = false;

    //set true if you want to enable RTL (Right To Left) mode, e.g : Arabic Language
    public static final boolean ENABLE_RTL_MODE = false;

    //set true for enable date display, set false for disable date display
    public static final boolean ENABLE_DATE_DISPLAY = true;

}