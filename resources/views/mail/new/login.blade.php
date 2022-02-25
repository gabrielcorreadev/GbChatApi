@component('mail::message')
# Um novo aparelho está usando sua conta

Olá, {{$data['name']}}

Um novo aparelho acessou sua conta<br>
(<strong>{{$data['email']}}</strong>)

<table style="margin-bottom: 15px;">
  <tr>
    <th style="text-align: left;">Aparelho</th>
  </tr>
  <tr>
    <td style="text-align: left;">{{$data['device_name']}}</td>
  </tr>
  <tr>
    <th style="text-align: left;">Localização</th>
  </tr>
  <tr>
    <td style="text-align: left;">{{$data['localization']}}</td>
  </tr>
</table>

Obrigado(a),<br>
{{ config('app.name') }}
@endcomponent
