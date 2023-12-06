import java.util.ArrayList;
import java.util.List;

public class Halte {
    public String namaHalte;
    public List<Penumpang> penumpangTurun;
    public List<Penumpang> penumpangNaik;

    public Halte(String namaHalte) {
        this.namaHalte = namaHalte;
        this.penumpangTurun = new ArrayList<>();
        this.penumpangNaik = new ArrayList<>();
    }

    public void tambahPenumpangNaik(Penumpang penumpang) {
        penumpangNaik.add(penumpang);
    }

    public void keluarkanPenumpangTurun(Penumpang penumpang) {
        penumpangTurun.add(penumpang);
    }

    public List<Penumpang> getPenumpangTurun() {
        return penumpangTurun;
    }

    public List<Penumpang> getPenumpangNaik() {
        return penumpangNaik;
    }
}
