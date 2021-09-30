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
      p{
        line-height: 1.8;
        margin: 0px;
        padding: 0px;
      }
      br {
        line-height: 1.9
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
      .italic {
        font-style: italic;
      }
      .new-page {
        page-break-after: always;
      }
       hr {
        border: 1px solid #538DD5;
        margin-bottom: 35px;
      }
      .line {
        position: absolute;
        top: 200px;
        left: 20px;
        width: 95%;
        z-index: -1000;
        border-left: 3px solid #538DD5;
        border-right: 3px solid #538DD5;
      }
      .information {
        position: absolute;
        width: 92%;
        left: 30px;
        top: 210px;
      }

    </style>
</head>

<body>
  <div class="insignea center">
    <img src="{{ public_path('img/bandeira_angola.png') }}" width="70" height="80" ><br>
    REPÚBLICA DE ANGOLA <br>
    TRIBUNAL PROVINCIAL DE MALANJE <br>
    <u>LIQUIDAÇÃO DA PENA</u> <br>
  </div>

  <div class="line">
    @for($i = 0; $i < 28; $i++)
    <hr>
    @endfor
  </div>

  <div class="information">
    <p>Reu: <span class="bold">{{ $process->cause_judge->full_name }}</span></p>
    <p>
      Julgado em: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span>
      <span style="float: right;">A sentença transitou em <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span></span>
    </p>

    <br>
    <p class="bold center">PRISÃO PREVENTIVA SOFRIDA</p>
    <p>
      Preso em: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span>
      <span style="float: right">Solto em: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span></span>
    
    </p>

    <br>
    <p class="bold center">PRISÃO PREVENTIVA</p>
    <p>Total de prisão preventiva: <span></span></p>
    <br>
    <p class="bold center">PENA APLICADA A FLS</p>
    <p>Prisão: <span class="bold">{{ $process->verdict }}</span></p>
    <p>Multa convertida: <span class="bold"></span></p>
    <br>
    <p class="bold center">TOTAL A CUMPRIR</p>
    <p>Iniciou o cumprimento da pena em: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> e assim temos: </p>
    <p>Na prisão de: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> a <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> = <span class="bold">0 anos</span></p>
    <p><span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> a <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> = <span class="bold">0 anos</span></p>
    <p><span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> a <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span> = <span class="bold">0 anos</span></p>
    <p>Pena de prisão a cumprir <span class="bold">{{ strtoupper($process->verdict) }}</span></p>
    <p><span class="bold italic">Obs.: Com a redução de 1/4 da pena de prisão a luz lei n. 11/16 - Lei de Aministia</span></p>
    <p>Na multa de: <span class="bold"></span></p>
    <br>

    <p>Data provavél de soltura: <span class="bold">{{ date('d-m-Y', strtotime($process->created_at)) }}</span></p>
    <br>
    <p class="bold center">O Escrivão</p>
    <br>
    <p class="bold center">{{ ucwords($process->user->full_name) }}</p>
  </div>