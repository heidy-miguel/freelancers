<h1>{{ $application->title }}</h1>
<br>
<br>
<p>{{ $application->description }}</p>

<p><a href="{{ route('application.show', [$application->id]) }}">Ver detalhe da solicitação</a></p>