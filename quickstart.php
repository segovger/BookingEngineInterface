<?php
require __DIR__ . '/vendor/autoload.php';

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

//Recoger variables de checkout.php

//Datos de cliente
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['client_email'];
$phonenum = $POST['client_phone'];
$token = $POST['stripeToken'];

//Datos de Pago
$costo_traslado = $POST['costo_traslado'];
$costo_reserva = $POST['costo_reserva'];
$pago_pendiente = $POST['pago_pendiente'];

$precioReservaSt = $costo_reserva * 100;

//Datos de Traslado
$origen_traslado = $POST['origen'];
$destino_traslado = $POST['destino'];
$fecha_traslado = $POST['fecha'];
$hora_traslado = $POST['horario'];
$num_pasajeros = $POST['num_pasajeros'];
$nombre_pasajeros = $POST['nombre_pasajeros'];
$direccion_origen = $POST['direccion_origen'];
$direccion_destino = $POST['direccion_destino'];
$asientos_bebe = $POST['asientos_bebe'];
$silla_bebe = $POST['silla_bebe'];
$paradas_intermedias = $POST['paradas_intermedias'];
$detalles_adicionales = $POST['detalles_adicionales'];

//Si punto de partida es Cancun
$origen_aeropuerto = $POST['origen_aeropuerto'];
$num_vuelo = $POST['num_vuelo'];
$aerolinea = $POST['aerolinea'];


/* 
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
*/

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('calendarApi/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'calendarApi/token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();

if (empty($events)) {
    //print "No upcoming events found.\n";
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&email='.$charge->receipt_email);
} else {
    //print "Upcoming events:\n";
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&email='.$charge->receipt_email);
    /*
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        printf("%s (%s)\n", $event->getSummary(), $start);
    }
    */
}

// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.

$mail_desc = "$origen_traslado - $destino_traslado";
$nombre_reservacion = $first_name . $last_name;
$mail_txt = $mail_desc . " A nombre de $nombre_reservacion";

//MM/DD/YYYY
$mes = substr($fecha_traslado, -10, 2); //Processing
$dia = substr($fecha_traslado, -7, 2); //Processing
$year = substr($fecha_traslado, -4, 4); //Processing

$dia_viaje = $year . "-" . $mes . "-" . $dia;


$hora = $hora_traslado . ":00"; //Input
$segundos = ":00";
$horaSeleccionada = "T" . $hora . $segundos;

$hora_fin = $hora + 1 . ":00";
$segundosFin = ":00";
$horaSeleccionadaFin = "T" . $hora_fin . $segundosFin;



//Consolidando Tiempo de reserva
$reserva = $dia_viaje . $horaSeleccionada;

//Consolidando tiempo de reserva fin
$reservaFin = $dia_viaje . $horaSeleccionadaFin;


$event = new Google_Service_Calendar_Event(array(
    'summary' => 'Cancun travelers',
    'location' => $origen,
    'description' => $mail_txt,
    'start' => array(
      'dateTime' => $reserva,
      'timeZone' => 'America/Cancun',
    ),
    'end' => array(
      'dateTime' => $reservaFin,
      'timeZone' => 'America/Cancun',
    ),
    'recurrence' => array(
      'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'attendees' => array(
      array('email' => 'info@cancuntravelers.com' ), //Host
      array('email' => $email), //Asistente
    ),
    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 10),
      ),
    ),
  ));
  
  $calendarId = 'primary';
  $event = $service->events->insert($calendarId, $event);
  printf('Event created: %s\n', $event->htmlLink);

  ?>