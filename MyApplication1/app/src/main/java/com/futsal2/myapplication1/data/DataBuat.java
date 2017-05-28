package com.futsal2.myapplication1.data;


public class DataBuat {
    private String id_buat, nama_match, pilih_tempat, no_lap, max_pemain, waktu_main, jam_main, pemain_kini;

    public DataBuat() {
    }
    public DataBuat(String id_buat, String nama_match, String pilih_tempat, String no_lap, String max_pemain, String waktu_main, String jam_main, String pemain_kini) {
        this.id_buat = id_buat;
        this.nama_match = nama_match;
        this.pilih_tempat = pilih_tempat;
        this.no_lap = no_lap;
        this.max_pemain = max_pemain;
        this.waktu_main = waktu_main;
        this.jam_main = jam_main;
        this.pemain_kini = pemain_kini;
    }
    public String getId_buat() {
        return id_buat;
    }
    public void setId_buat(String id_buat) {
        this.id_buat = id_buat;
    }
    public String getNama_match() {
        return nama_match;
    }
    public void setNama_match(String nama_match) {
        this.nama_match = nama_match;
    }
    public String getPilih_tempat() {
        return pilih_tempat;
    }
    public void setPilih_tempat(String pilih_tempat) {
        this.pilih_tempat = pilih_tempat;
    }
    public String getNo_lap() {
        return no_lap;
    }
    public void setNo_lap(String no_lap) {
        this.no_lap = no_lap;
    }
    public String getMax_pemain() {
        return max_pemain;
    }
    public void setMax_pemain(String max_pemain) {
        this.max_pemain = max_pemain;
    }
    public String getWaktu_main() {
        return waktu_main;
    }
    public void setWaktu_main(String waktu_main) {
        this.waktu_main = waktu_main;
    }
    public String getJam_main() {
        return jam_main;
    }
    public void setJam_main(String jam_main) {
        this.jam_main = jam_main;
    }
    public String getPemain_kini() {
        return pemain_kini;
    }
    public void setPemain_kini(String pemain_kini) {
        this.pemain_kini = pemain_kini;
    }
}
