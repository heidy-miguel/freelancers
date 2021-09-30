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
       hr {
        border: 1px dashed black;
        margin-bottom: 35px;
      }

      .center {
        text-align: center;
      }
      .insignea {
        font-weight: bold;
        margin-bottom: 30px; 
      }

      .bg-grey {
        background-color: lightgrey;
      }
      .bold {
        font-weight: bold;
      }
      .italic {
        font-style: italic;
      }

      table {
        border-spacing: 0.5rem;
        border-collapse: collapse;
        width: 80%;
        font-size: 15px;
        margin: 0 auto;
      }
      thead {
        background-color: #252525;
        color: white;
      }
      td, th {
        border-bottom: 1px solid #999;
        padding: 0.1rem;
      }

    </style>
</head>

<body>
  <div class="insignea center">
    <img src="{{ public_path('img/bandeira_angola.png') }}" width="70" height="80" ><br>
    REPÚBLICA DE ANGOLA <br>
    TRIBUNAL PROVINCIAL DE MALANJE <br>
    CONTADORIA <br>
  </div>

  <div class="center">
    <p>Proc. n.º {{ $process->number }}</p>
    <p>Conta nº __________/2021</p>
  </div>

<br>
  <div>
    <table>
      <tr>
        <td>Valor da Acção</td>
        <td class="bold">20.000,00 kz</td>
      </tr>
      <tr>
        <td>Taxa de Justiça</td>
        <td>42.240,00 kz</td>
      </tr>
      <tr>
        <td>Taxa a Distribuir</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr class="bg-grey">
        <td class="bold center" colspan="2">COFRE GERAL DE JUSTIÇA</td>
      </tr>
      <tr>
        <td>30% da Taxa de Justiça</td>
        <td>3,168.00 Kz</td>
      </tr>
      <tr>
        <td>Sobretaxa 10%</td>
        <td>1,056.00 Kz</td>
      </tr>
      <tr>
        <td>Fixo</td>
        <td>880.00 Kz</td>
      </tr>
      <tr>
        <td>Despesas de Transporte</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Papel (07 fls)</td>
        <td>2,016.00 Kz</td>
      </tr>
      <tr>
        <td>Procuradoria</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>30% da multa</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>30% Integração emolumentar</td>
        <td>3,168.00 Kz</td>
      </tr>
      <tr>
        <td></td>
        <td class="bold">10,288.00 Kz</td>
      </tr>
      <tr class="bg-grey">
        <td class="bold center" colspan="2">CARTÓRIO</td>
      </tr>
      <tr>
        <td>Oficial</td>
        <td>Sr. Neves Moxi</td>
      </tr>
      <tr>
        <td>40% da taxa de Justiça</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr>
        <td>40% da Multa Criminal</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr>
        <td>Caminhos (fls.)</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr>
        <td>Selos</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr>
        <td>Oficial</td>
        <td>10.560,00 Kz</td>
      </tr>
      <tr>
        <td>Caminhos</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Selo de</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Oficial</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Caminhos</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Selos</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td></td>
        <td class="bold">0,00 Kz</td>
      </tr>
      <tr class="bg-grey">
        <td class="bold center" colspan="2">CUSTAS DE PARTES</td>
      </tr>
      <tr>
        <td>Papel, selos e despesas</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Preparos de fls</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Procuradoria</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Selos</td>
        <td>0,00 Kz</td>
      </tr>
      <tr class="bg-grey">
        <td class="bold center" colspan="2">RECEITA DO ESTADO</td>
      </tr>
      <tr>
        <td>30% da Taxa de Justiça.</td>
        <td>3,168.00 Kz</td>
      </tr>
      <tr>
        <td>30% da multa criminal</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Exames médicos de Fls</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Selo de Processado fls/20</td>
        <td>1,120.00 Kz</td>
      </tr>
      <tr>
        <td>Selo de recibo</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Selo de Rec. Nac</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td>Patronato das prisões</td>
        <td>176.00 Kz</td>
      </tr>
      <tr>
        <td>Abatendo preparos de fls. 33</td>
        <td>0,00 Kz</td>
      </tr>
      <tr>
        <td class="bold">Em dívida</td>
        <td>0,00 Kz</td>
      </tr>
    </table>

    <br>
    <p> Guias a passar a cargo de: <span class="bold">Neves Maurício</span></p>
    <br>
    <p>Haver:</p>

    @for($i = 0; $i < 13; $i++)
    <hr>
    @endfor

    <br>
    <br>
    <br>
    <div class="center">
      Malanje, aos {{ date('d', strtotime(now())) }} de {{ date('F', strtotime(now())) }} de {{ date('Y', strtotime(now())) }}
    </div>

    <br>
    <br>
    <p class="center">O Contador</p>
    <br>
    <br>
    <p class="center">{{ ucwords(auth()->user()->full_name) }}</p>
  </div>
  </div>