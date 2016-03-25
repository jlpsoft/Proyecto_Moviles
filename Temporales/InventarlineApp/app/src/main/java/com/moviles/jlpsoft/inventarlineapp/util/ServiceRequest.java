package com.moviles.jlpsoft.inventarlineapp.util;

import org.apache.commons.lang3.StringUtils;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URI;
import java.util.List;

public class ServiceRequest {
    HttpClient client;
    HttpEntity entity;
    HttpGet httpget;
    HttpPost httppost;
    List<NameValuePair> params;
    HttpResponse response;
    String url;
    URI website;

    public ServiceRequest(String url, List<NameValuePair> params) {
        this.response = null;
        this.client = new DefaultHttpClient();
        this.website = null;
        this.url = url;
        this.params = params;
    }

    public String MakePostRequest() {
        try {
            this.website = new URI(this.url);
            this.httppost = new HttpPost();
            if (this.params != null) {
                this.httppost.setEntity(new UrlEncodedFormEntity(this.params));
            }
            this.httppost.setURI(this.website);
            this.response = this.client.execute(this.httppost);
            this.entity = this.response.getEntity();
            return EntityUtils.toString(this.entity);
        } catch (Exception e) {
            return e.getMessage();
        }
    }

    public String MakePostRequest(String json) {
        String result = StringUtils.EMPTY;
        try {
            HttpClient httpclient = new DefaultHttpClient();
            HttpPost httpPost = new HttpPost(this.url);
            httpPost.setEntity(new StringEntity(json));
            httpPost.setHeader("Accept", "application/json");
            httpPost.setHeader("Content-type", "application/json");
            InputStream inputStream = httpclient.execute(httpPost).getEntity().getContent();
            if (inputStream != null) {
                result = convertInputStreamToString(inputStream);
            } else {
                result = "Did not work!";
            }
            return result;
        } catch (Exception e) {
            return e.getMessage();
        }
    }

    private static String convertInputStreamToString(InputStream inputStream) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
        String line = StringUtils.EMPTY;
        String result = StringUtils.EMPTY;
        while (true) {
            line = bufferedReader.readLine();
            if (line == null) {
                inputStream.close();
                return result;
            }
            result = new StringBuilder(String.valueOf(result)).append(line).toString();
        }
    }

    public String MakeGetRequest() {
        try {
            if (this.params != null) {
                this.url += "?" + URLEncodedUtils.format(this.params, "utf-8");
            }
            this.website = new URI(this.url);
            this.httpget = new HttpGet();
            this.httpget.setURI(this.website);
            this.response = this.client.execute(this.httpget);
            this.entity = this.response.getEntity();
            return EntityUtils.toString(this.entity);
        } catch (Exception e) {
            return "some error";
        }
    }
}
