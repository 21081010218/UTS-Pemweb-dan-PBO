/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Elang
 */
public class main {
    public static void main(String[] args) {
        // membuat bus dengan kapasitas maksimal 20
        Bus bus = new Bus(20);

        // menambahkan 5 penumpang awal di pull/kantor
        Penumpang penumpang1 = new Penumpang("Adi", "Surabaya");
        Penumpang penumpang2 = new Penumpang("Budi", "Gresik");
        Penumpang penumpang3 = new Penumpang("Cici", "Porong");
        Penumpang penumpang4 = new Penumpang("Dedi", "Surabaya");
        Penumpang penumpang5 = new Penumpang("Eka", "Gresik");

        // menambahkan penumpang ke dalam bus
        bus.tambahPenumpang();
        bus.tambahPenumpang();
        bus.tambahPenumpang();
        bus.tambahPenumpang();
        bus.tambahPenumpang();

        // membuat halte Porong
        Halte haltePorong = new Halte("Porong");
        // penumpang turun di halte Porong
        haltePorong.keluarkanPenumpangTurun(penumpang3);

        // penumpang naik di halte Porong
        Penumpang penumpang6 = new Penumpang("Fanny", "Surabaya");
        Penumpang penumpang7 = new Penumpang("Gina", "Gresik");
        haltePorong.tambahPenumpangNaik(penumpang6);
        haltePorong.tambahPenumpangNaik(penumpang7);

        // menampilkan jumlah penumpang di dalam bus setelah turun dan naik di halte Porong
        bus.jumlahPenumpang = bus.jumlahPenumpang - haltePorong.penumpangTurun.size() + haltePorong.penumpangNaik.size();
        bus.tampilkanJumlahPenumpang();

        // membuat halte Surabaya
        Halte halteSurabaya = new Halte("Surabaya");
        // penumpang turun di halte Surabaya
        halteSurabaya.keluarkanPenumpangTurun(penumpang1);
        halteSurabaya.keluarkanPenumpangTurun(penumpang4);

        // penumpang naik di halte Surabaya
        Penumpang penumpang8 = new Penumpang("Hadi", "Gresik");
        Penumpang penumpang9 = new Penumpang("Ira", "Porong");
        halteSurabaya.tambahPenumpangNaik(penumpang8);
        halteSurabaya.tambahPenumpangNaik(penumpang9);

        // menampilkan jumlah penumpang di dalam bus setelah turun dan naik di halte Surabaya
        bus.jumlahPenumpang = bus.jumlahPenumpang - halteSurabaya.penumpangTurun.size() + halteSurabaya.penumpangNaik.size();
        bus.tampilkanJumlahPenumpang();

        // membuat halte Gresik
        Halte halteGresik = new Halte("Gresik");
        // penumpang turun di halte Gresik
        halteGresik.keluarkanPenumpangTurun(penumpang2);
        halteGresik.keluarkanPenumpangTurun(penumpang5);

    // menampilkan jumlah penumpang di dalam bus setelah turun dan naik di halte Gresik
    bus.jumlahPenumpang = bus.jumlahPenumpang - halteGresik.penumpangTurun.size();
    bus.tampilkanJumlahPenumpang();
}

}