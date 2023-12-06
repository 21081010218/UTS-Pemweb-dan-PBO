/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Elang
 */
public class Bus {
    public int kapasitasMaksimal;
    public int jumlahPenumpang;

    public Bus(int kapasitasMaksimal) {
        this.kapasitasMaksimal = kapasitasMaksimal;
        this.jumlahPenumpang = 0;
    }

    public void tambahPenumpang() {
        if (jumlahPenumpang < kapasitasMaksimal) {
            jumlahPenumpang++;
        } else {
            System.out.println("Bus sudah penuh!");
        }
    }

    public void keluarkanPenumpang() {
        if (jumlahPenumpang > 0) {
            jumlahPenumpang--;
        } else {
            System.out.println("Bus sudah kosong!");
        }
    }

    public void tampilkanJumlahPenumpang() {
        System.out.println("Jumlah penumpang di dalam bus: " + jumlahPenumpang);
    }
}
