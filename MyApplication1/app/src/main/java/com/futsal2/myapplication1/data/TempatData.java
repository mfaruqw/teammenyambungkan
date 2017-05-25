package com.futsal2.myapplication1.data;


public class TempatData {
    private String id_tempat, nama_tempat, tanggal, detail, gambar;

    public TempatData() {
    }
    public TempatData(String id_tempat, String nama_tempat, String tanggal, String detail, String gambar) {
        this.id_tempat = id_tempat;
        this.nama_tempat = nama_tempat;
        this.tanggal = tanggal;
        this.gambar = gambar;
        this.detail = detail;
    }

    public String getId() {
        return id_tempat;
    }

    public void setId(String id) {
        this.id_tempat = id;
    }

    public String getNama_tempat() {
        return nama_tempat;
    }

    public void setNama_tempat(String nama_tempat) {
        this.nama_tempat = nama_tempat;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    public String getTanggal() {
        return tanggal;
    }

    public void setDatetime(String tanggal) {
        this.tanggal = tanggal;
    }

    public String getDetail() {
        return detail;
    }

    public void setDetail(String detail) {
        this.detail = detail;
    }
}
