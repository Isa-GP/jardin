<!-- resources/views/certificado.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 20px;
        }
        .header img {
            width: 100px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }
        .content {
            text-align: center;
            padding: 40px 0;
        }
        .content h2 {
            font-size: 20px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }
        .content .highlight {
            color: #4CAF50;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            border-top: 2px solid #4CAF50;
            padding-top: 20px;
            margin-top: 20px;
        }
        .footer p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .footer .signature {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
         <img src="https://iili.io/dz4nG7R.md.jpg" alt="dz4nG7R.md.jpg" border="0">
            <h1>JARDÍN INFANTIL DULCE ARMONIA</h1>
            <h2>Certificado de {{ ucfirst($tipoCertificado) }}</h2>
        </div>
        <div class="content">
            <h2>HACE CONSTAR QUE:</h2>
            <p>El estudiante <span class="highlight">{{ $nombreEstudiante }}</span>,</p>
            <p>con documento de identidad N° <span class="highlight">{{ $numeroDocumento }}</span>,</p>
            <p>se encuentra matriculado(a) en el grado <span class="highlight">{{ $grado }}</span>.</p>
            <p>Por su desempeño destacado en <span class="highlight">{{ $descripcionCertificado }}</span>.</p>
        </div>
        <div class="footer">
            <p>Expedido en Facatativá a la fecha de {{ date('d/m/Y') }}</p>
            <div class="signature">
                <p>____________________</p>
                <p>{{ $nombreDirectora }}</p>
                <p>DIRECTORA</p>
            </div>
            <p>{{ $nombreEmisor }}</p>
        </div>
    </div>
</body>
</html>
