<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\Tercero;
use App\Models\Inscripcione;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;

class Inscripcion extends Controller
{
   
    function index(){

        return view('forms.Inscripciones.inscripcion');

    }



    protected function validateRequest(Request $request)
{
 
        return $request->validate([
            'documento' => 'required|string|max:255',
            'tipo_docuId' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer|min:0',
            'rh' => 'required|integer|exists:grupo_sanguineo,id',
            'alergias' => 'nullable|string|max:255',
            'plan' => 'required|integer|exists:plans,id',
            'num_docu' => 'required|string|max:255',
            'eps' => 'required|string|max:255',
            'tipo_docuId_padre' => 'required|integer',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad_padre' => 'required|integer|min:0',
            'celular' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'departamento' => 'required|integer|exists:departamentos,id',
            'municipio' => 'required|integer|exists:municipios,id',
            'correo' => 'required|string|email|max:255',
            'parentesco' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'valorMatricula' => 'required|numeric|min:0',
            'curso' => 'required|integer|exists:cursos,id',
        ]);
   
}

public function store(Request $request)
{
    // Validar la solicitud
    $validatedData = $this->validateRequest($request);

    // Verificar si la validación falló
    if ($validatedData instanceof \Illuminate\Http\JsonResponse) {
        // Si la validación falla, retorna la respuesta JSON con los errores
        return response()->json(['success' => false, 'message' => $validatedData], 422);
    }

    // Iniciar la transacción
    DB::beginTransaction();

    try {
        // Guardar datos del estudiante
        $estudiante = Estudiante::create([
            'documento' => $validatedData['documento'],
            'tipo_docuId' => $validatedData['tipo_docuId'],
            'nombre' => $validatedData['nombre'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'edad' => $validatedData['edad'],
            'tipo_sangre_id' => $validatedData['rh'],
            'alergias' => $validatedData['alergias'],
            'plan_id' => $validatedData['plan'],
            'nume_docu_acud' => $validatedData['num_docu'],
            'eps' => $validatedData['eps'],
            'estado' => 0,
        ]);

        // Verificar si el tercero ya existe
        $tercero = Tercero::where('tipo_docuId', $validatedData['tipo_docuId_padre'])
            ->where('num_docu', $validatedData['num_docu'])
            ->first();

        if ($tercero) {
            // Si el tercero ya existe, actualizar los datos
            $tercero->update([
                'nombres' => $validatedData['nombres'],
                'apellidos' => $validatedData['apellidos'],
                'edad' => $validatedData['edad_padre'],
                'celular' => $validatedData['celular'],
                'direccion' => $validatedData['direccion'],
                'barrio' => $validatedData['barrio'],
                'departamento_id' => $validatedData['departamento'],
                'municipio_id' => $validatedData['municipio'],
                'correo' => $validatedData['correo'],
                'parentesco' => $validatedData['parentesco'],
                'profesion' => $validatedData['profesion'],
            ]);
        } else {
            // Si el tercero no existe, crear un nuevo registro
            $tercero = Tercero::create([
                'tipo_docuId' => $validatedData['tipo_docuId_padre'],
                'num_docu' => $validatedData['num_docu'],
                'nombres' => $validatedData['nombres'],
                'apellidos' => $validatedData['apellidos'],
                'edad' => $validatedData['edad_padre'],
                'celular' => $validatedData['celular'],
                'direccion' => $validatedData['direccion'],
                'barrio' => $validatedData['barrio'],
                'departamento_id' => $validatedData['departamento'],
                'municipio_id' => $validatedData['municipio'],
                'correo' => $validatedData['correo'],
                'parentesco' => $validatedData['parentesco'],
                'profesion' => $validatedData['profesion'],
            ]);
        }

        // Crear la inscripción
        $inscripcion = Inscripcione::create([
            'estudiante_id' => $estudiante->id,
            'tercero_id' => $tercero->id,
            'curso_id' => $validatedData['curso'],
            'plan_id' => $validatedData['plan'],
            'fecha_inscripcion' => now(),
            'valor' => $validatedData['valorMatricula'],
            'pago' => false, // Inicialmente no pagado
        ]);

        // Generar el link de pago con Openpay
        $paymentLink = $this->generarLinkDePago($inscripcion, $tercero);
        $inscripcionId = $inscripcion->id;

        try {
            if (!$paymentLink) {
                throw new \Exception('El link de pago no se generó correctamente.');
            }

            // Actualizar la inscripción con el link de pago
            Inscripcione::where('id', $inscripcionId)->update([
                'payment_link' => $paymentLink
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error al actualizar la inscripción: ' . $e->getMessage()], 500);
        }

        // Confirmar la transacción
        DB::commit();

        return response()->json(['success' => true, 'message' => 'Inscripción realizada correctamente', 'payment_link' => $paymentLink], 200);
    } catch (Exception $e) {
        // Si ocurre un error, revertir la transacción
        DB::rollBack();

        // Retornar una respuesta con el error detallado
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}




private function generarLinkDePago($inscripcion, $tercero)
{

    $redirectUrl = route('payment.success', ['id' => $inscripcion->id]);
    // Datos para la solicitud a Openpay
    $data = [
        "amount" => $inscripcion->valor,
        "currency" => "COP",
        "description" => "Cargo cobro con link",
        "redirect_url" => $redirectUrl,
        "order_id" => "Inscripcion-" . $inscripcion->id,
        "expiration_date" => "2026-08-31 12:50",
        "send_email" => true,
        "customer" => [
            "name" => $tercero->nombres,
            "last_name" => $tercero->apellidos,
            "phone_number" => $tercero->celular,
            "email" => $tercero->correo
        ]
    ];

    // Hacer la solicitud a Openpay
    $response = Http::withBasicAuth('sk_a84f3f41733740a8bac9d03be2862d04', '')
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post('https://sandbox-api.openpay.co/v1/m3twop5z0fgozst6ni6r/checkouts', $data);

    if ($response->successful()) {
        $responseData = $response->json();
        return $responseData['checkout_link'] ?? null;
    }

    throw new \Exception('Error en la solicitud a Openpay: ' . $response->body());
}

}
