<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SGP - Sistema de Gestão Processual</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <style type="text/css"> 
      body {
        font-weight: 16px;
        font-size: 20px;
      }
      p {
        line-height: 1.6;
      }
      .document-date {
        text-align: center;
        margin-top: 75px;
        margin-bottom: 25px;
        font-weight: bold;
      }
      .center {
        text-align: center;
      }
      .insignea {
        font-weight: bold;
        margin-bottom: 30px; 
      }
      .red {
        color: darkred;
      }
      .bold {
        font-weight: bold;
      }
      .new-page {
        page-break-after: always;
      }

    </style>
</head>

<body>
  <div class="insignea center">
    <img src="{{ public_path('img/bandeira_angola.png') }}" width="70" height="80" ><br>
    REPÚBLICA DE ANGOLA <br>
    TRIBUNAL PROVINCIAL DE MALANJE <br>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div>
    <div>
      <span style="">Proc Nº <span class="red">{{ $process->number }}</span></span>
      <span style="float: right;">Ano de {{ date('Y', strtotime($process->created_at)) }}</span>
    </div>
  </div>
  <br>
  <br>
  <br>
  <h2 class="center bold">COMARCA DE MALANJE</h2>
  <br>
  <br>
  <br>
  <br>
  <br>
  <h3 class="center red bold">ACÇÃO EXECUTIVA PARA PAGAMENTO DE QUANTIA CERTA</h3>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div>
    <h3 class="center">EXEQUENTE:</h3>
    <p><span class="red bold">ESTADO ANGOLANO </span>, REPRESENTADO PELO <span class="red bold">{{ strtoupper($process->author->name) }}</span> devidamente identificado nos autos.</p>
  </div>

  <br>
  <br>
  <br>
    <div>
    <h3 class="center">EXECUTADO:</h3>
    <p><span  class="red bold">ESTADO ANGOLANO </span>, REPRESENTADO PELO SENHOR <span class="red bold">LUÍS PAULO FRANCISCO PAPELO</span> devidamente identificado nos autos.</p>
  </div>
  

  <div class="new-page"></div>
  <br>
  <br>
  <br>
  <br>
  <h3 class="center">AUTUAÇÃO</h3>
  <p>Aos________de__________de dois mil e dezoito, nesta cidade de Malanje e no
    Cartório a meu Cargo, autuei os autos de ACÇÃO EXECUTIVA, que foram
    distribuídos pelo distribuidor do Tribunal, inscritos em _______fls., de papel regular,
    sem vícios que a meu ver faça.
  </p>
  <br>
  <br>
  <br>
  <br>
  <p class="center">O Secretário Judicial</p>
  <p class="center">_____________________________</p>
  <p class="center">{{ ucwords(Auth::user()->full_name) }}</p>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <P>COTA:</P>
  <P>Registado no livroo no 14, fls n._________, sob o n.o __________________</P>
  <div class="document-date center">
    Malanje, aos {{ date('d', strtotime(now())) }} de {{ date('F', strtotime(now())) }} de {{ date('Y', strtotime(now())) }}
  </div>
</body>
</html>
