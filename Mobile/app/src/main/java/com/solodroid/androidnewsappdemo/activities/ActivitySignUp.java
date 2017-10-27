package com.solodroid.androidnewsappdemo.activities;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

import com.solodroid.androidnewsappdemo.R;

public class ActivitySignUp extends AppCompatActivity {

    Button SignIn,SignUp;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        SignIn = (Button) findViewById(R.id.sign_in);
        SignIn.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                // click handling code
                Intent intent = new Intent(getBaseContext(), MainActivity.class);
                //memulai activity baru ketika waktu timer habis
                startActivity(intent);
            }
        });




    }
}