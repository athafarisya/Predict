from flask import Flask, request, jsonify
import joblib
import numpy as np
import os

# Load model, scaler, dan batas minimum IPS
model_dir = "model_trained"
model_path = os.path.join(model_dir, "decision_tree_model.pkl")
scaler_path = os.path.join(model_dir, "scaler.pkl")
min_ips_path = os.path.join(model_dir, "min_ips_lulus.pkl")

if not os.path.exists(model_path) or not os.path.exists(scaler_path) or not os.path.exists(min_ips_path):
    raise FileNotFoundError("Model, scaler, atau batas minimum IPS belum ditemukan. Pastikan sudah dilatih.")

dt_model = joblib.load(model_path)
scaler = joblib.load(scaler_path)
min_ips_lulus = joblib.load(min_ips_path)

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.json
        ips_values = []
        for i in range(1, 8):
            value = data.get(f'ips{i}')
            if value is None:
                return jsonify({'error': f'Missing value for IPS{i}'}), 400
            try:
                value = float(value)
            except ValueError:
                return jsonify({'error': f'Invalid value for IPS{i}, must be a number'}), 400
            ips_values.append(value)
        
        masa_studi = data.get('masa_studi')
        if masa_studi is None:
            return jsonify({'error': 'Missing status_cuti field'}), 400

        # Jika mahasiswa cuti, langsung dikategorikan "Tidak Tepat Waktu"
        if masa_studi > 4:
            return jsonify({
                'status': 'success',
                'result': {
                    'prediction': 'Tidak tepat waktu',
                    'probability': 0.0,
                    'predicted_class': 0
                }
            })

        # Validasi apakah semua nilai IPS memenuhi batas minimum
        for i, ips in enumerate(ips_values):
            ips_key = f'IPS{i+1}'
            if ips < min_ips_lulus[ips_key]:  # Jika ada IPS di bawah batas minimal
                return jsonify({
                    'status': 'success',
                    'result': {
                        'prediction': 'Tidak tepat waktu',
                        'probability': 0.0,
                        'predicted_class': 0
                    }
                })

        # Konversi input menjadi array numpy
        features = np.array(ips_values).reshape(1, -1)
        features_scaled = scaler.transform(features)

        # Prediksi hasil menggunakan model
        prediction = dt_model.predict(features_scaled)[0]
        probability = dt_model.predict_proba(features_scaled)[0][1]  # Probabilitas kelas "Tepat Waktu"
        result = 'Tepat waktu' if prediction == 1 else 'Tidak tepat waktu'

        return jsonify({
            'status': 'success',
            'result': {
                'prediction': result,
                'probability': float(probability),
                'predicted_class': int(prediction)
            }
        })
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@app.route('/get_status_cuti', methods=['POST'])
def get_status_cuti():
    try:
        data = request.json
        status_cuti = data.get('status_cuti')
        if status_cuti is None:
            return jsonify({'error': 'Missing status_cuti field.'}), 400
        result = 'Cuti' if status_cuti == 1 else 'Tidak cuti'
        return jsonify({'status': 'success', 'status_cuti': result})
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=False)
