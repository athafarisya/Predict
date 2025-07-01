# Panduan Instalasi REST API dengan Model SVM

## Prasyarat
Sebelum memulai instalasi, pastikan Anda telah menginstal perangkat berikut:

1. **Python** (versi 3.7 atau lebih baru)
2. **Pip** (paket manajer Python)
3. Editor teks atau IDE (seperti VSCode atau PyCharm)

## Langkah Instalasi

### 1. Buat Virtual Environment (Opsional)
Sangat disarankan untuk menggunakan virtual environment agar dependensi proyek tidak bentrok dengan sistem.

```bash
$ python -m venv venv
$ source venv/bin/activate  # Untuk Linux/Mac
$ venv\Scripts\activate   # Untuk Windows
```

### 2. Instal Dependensi

Instal semua library yang diperlukan dengan perintah berikut:
```bash
$ pip install -r requirements.txt
```

Jika tidak ada file `requirements.txt`, tambahkan dependensi berikut secara manual:
```bash
$ pip install flask numpy scikit-learn joblib
```

### 3. Pastikan Model dan Scaler Tersedia
Pastikan file berikut ada di direktori proyek:
- `svm_model.pkl` (model yang telah dilatih)
- `scaler.pkl` (untuk normalisasi data input)

### 4. Jalankan Server API

Untuk menjalankan server Flask, gunakan perintah berikut:
```bash
$ python app.py
```
Server akan berjalan di `http://127.0.0.1:5000` secara default.

### 5. Uji API

#### Menggunakan cURL
Kirim permintaan POST menggunakan cURL:
```bash
curl -X POST -H "Content-Type: application/json" -d '{
    "tahun_lahir": 2000,
    "jenis_kelamin": "Laki-laki",
    "ips_1": 3.5,
    "ips_2": 3.6,
    "ips_3": 3.7,
    "ips_4": 3.8,
    "ips_5": 3.9,
    "ips_6": 3.6,
    "ips_7": 3.4,
    "ips_8": 3.7
}' http://127.0.0.1:5000/predict
```

#### Menggunakan Postman
1. Buka aplikasi **Postman**.
2. Buat request baru dengan metode **POST**.
3. Masukkan URL: `http://127.0.0.1:5000/predict`.
4. Pilih tab **Body**, lalu pilih **raw** dan ubah format ke **JSON**.
5. Masukkan data berikut:
   ```json
   {
       "tahun_lahir": 2000,
       "jenis_kelamin": "Laki-laki",
       "ips_1": 3.5,
       "ips_2": 3.6,
       "ips_3": 3.7,
       "ips_4": 3.8,
       "ips_5": 3.9,
       "ips_6": 3.6,
       "ips_7": 3.4,
       "ips_8": 3.7
   }
   ```
6. Klik **Send** untuk mendapatkan hasil prediksi.

### 7. Output
Jika berhasil, API akan memberikan output seperti berikut:
```json
{
    "prediction": "Tepat waktu"
}
```

## Troubleshooting

1. **Error: Modul Flask tidak ditemukan**
   - Pastikan Flask telah terinstal dengan benar:
     ```bash
     $ pip install flask
     ```

2. **Error: Model atau scaler tidak ditemukan**
   - Pastikan file `svm_model.pkl` dan `scaler.pkl` berada di direktori yang sama dengan `app.py`.

3. **Port sudah digunakan**
   - Jika port default (5000) sudah digunakan, jalankan Flask dengan port lain:
     ```bash
     $ python app.py --port=5001
     ```
