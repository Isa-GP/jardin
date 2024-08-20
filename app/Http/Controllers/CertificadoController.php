<?php
// app/Http/Controllers/CertificadoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Mail;
use App\Models\estudiante;

class CertificadoController extends Controller
{
    public function generar(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'tipoCertificado' => 'required',
            'numeroDocumento' => 'required',
        ]);
        $numeroDocumento=$request->input('numeroDocumento');
        // Datos del certificado
             // Obtener el estudiante cuyo documento coincida con el valor enviado
        $estudiante = Estudiante::where('documento', $numeroDocumento)->first();
        
        $data = [
            'tipoCertificado' => $request->input('tipoCertificado'),
            'numeroDocumento' => $request->input('numeroDocumento'),
            'nombreEstudiante' => $estudiante->nombre, // Aquí deberías obtener el nombre del estudiante basado en el número de documento
            'grado' => 'kinder', // Dependiendo del tipo de certificado puedes cambiar esto
            'nombreDirectora' => 'María Patricia López',
            'nombreEmisor' => 'Sandra C.',
            'descripcionCertificado' => $this->getDescripcionCertificado($request->input('tipoCertificado')),
        ];

        // Generar el PDF
        $pdf = PDF::loadView('page.pdf', $data);

        // Enviar el correo con el certificado adjunto
        Mail::send('page.pdf', $data, function ($message) use ($data, $pdf) {
            $message->to('mariapolanco0617@gmail.com')
                ->subject('Certificado de ' . ucfirst($data['tipoCertificado']))
                ->attachData($pdf->output(), 'certificado.pdf');
        });

        return response()->json(['success' => true, 'message' => 'Certificado generado y enviado por correo.']);
    }

    private function getDescripcionCertificado($tipo)
    {
        switch ($tipo) {
            case 'participacion':
                return 'Participación en actividades del jardín infantil.';
            case 'excelencia':
                return 'Excelencia académica durante el periodo escolar.';
            case 'comportamiento':
                return 'Comportamiento ejemplar en el jardín infantil.';
            case 'creatividad':
                return 'Creatividad demostrada en actividades artísticas.';
            case 'asistencia':
                return 'Asistencia perfecta durante el periodo escolar.';
            case 'amistad':
                return 'Habilidades sobresalientes en amistad y colaboración.';
            case 'esfuerzo':
                return 'Esfuerzo y dedicación en todas las actividades.';
            default:
                return 'Desempeño destacado en el jardín infantil.';
        }
    }
}
