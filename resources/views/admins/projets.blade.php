@extends("admins.app")
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .hidden {
        display: none;
    }

    #chatbox {
        width: 300px;
        position: fixed;
        bottom: 10px;
        right: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #fff;
    }

    #messages {
        max-height: 200px;
        overflow-y: scroll;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }

    #messageInput {
        width: 70%;
        padding: 5px;
        border: 1px solid #ccc;
    }

    #sendBtn {
        padding: 5px 10px;
        background-color: #00cc66;
        border: none;
        color: #fff;
    }

</style>
@section('content')
    <div class="card">
        <div class="card-header">

            <h3 class="card-title"><b>Projets</b></h3>
            <div class="d-flex justify-content-end">
                <div><a href="{{route('projets.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau projet</a></div>
            </div>
        </div>
        @if(session()->has("success"))
            <div class="alert alert-success" style="text-align: center !important;">
                <h6>{{session()->get('success')}}</h6>
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger" style="text-align: center !important;">
                <h6>{{session()->get('error')}}</h6>
            </div>
        @endif
        @if(session()->has("successDelete"))
            <div class="alert alert-success" style="text-align: center !important;">
                <h6>{{session()->get('successDelete')}}</h6>
            </div>
        @endif
        <!-- /.card-header -->

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 15%">
                                Nom
                            </th>
                            <th style="width: 25%">
                                Taches - Membres
                            </th>
                            <th>
                                Progression
                            </th>
                            <th style="width: 5%" class="text-center">
                                Statut
                            </th>
                            <th style="width: 30%" class="text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $projet)
                            <tr>
                                <td>
                                    {{$loop->index + 1}}
                                </td>
                                <td>
                                    <a>
                                        {{$projet->nomProjet}}
                                    </a>
                                    <br/>
                                    <small>
                                        Créé le {{$projet->created_at->format('d/m/Y')}}
                                    </small>
                                </td>
                                <td>
                                    @foreach($projet->taches as $tache)
                                        {{ $tache->nomTache }}:
                                        @foreach($tache->utilisateursAssignes as $utilisateur)
                                            <label class="badge badge-dark">{{ $utilisateur->name }}</label>
                                        @endforeach
                                        <br>
                                    @endforeach
                                </td>
                                <?php
                                    $tachesTerminees = $projet->taches->where('statut', 'Terminée')->count();
                                    $totalTaches = $projet->taches->count();
                                    $pourcentageTachesTerminees = ($totalTaches > 0) ? ($tachesTerminees / $totalTaches) * 100 : 0;
                                    //echo $pourcentageTachesTerminees . '%';
                                    if ($pourcentageTachesTerminees != (int)$pourcentageTachesTerminees) {
                                        $p = number_format($pourcentageTachesTerminees, 2);
                                    } else {
                                        $p = $pourcentageTachesTerminees;
                                    }
                                ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$p}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$p}}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{$p}}% Complete
                                    </small>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">{{$projet->statut}}</span>
                                </td>
                                <td class="project-actions text-center">

                                    <a class="btn btn-success" href="{{route('projetDetails.print', ['projet'=>$projet->id])}}">
                                        <i class="fas fa-print" title="Details du projet">
                                        </i>

                                    </a>

                                    <a class="btn btn-primary btn-sm" href="{{route('projets.details', ['projet'=>$projet->id])}}">
                                        <i class="fas fa-eye" title="Details du projet">
                                        </i>

                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('projets.edit', ['projet'=>$projet->id])}}">
                                        <i class="fas fa-pencil-alt" title="Modifier">
                                        </i>

                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce projet?')){document.getElementById('form-{{$projet->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                                    <form id="form-{{$projet->id}}" action="{{route('projets.supprimer', ['projet'=>$projet->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
{{--                                     <button id="openChatBtn" class="btn btn-warning btn-sm" data-projet-id="{{ $projet->id }}">Chat</button>
                                    <div id="chatbox" class="hidden">
                                        <div id="messages"></div>
                                        <input type="text" id="messageInput" placeholder="Entrez votre message...">
                                        <button id="sendBtn">Envoyer</button>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    const openChatBtn = document.getElementById('openChatBtn');
    const chatbox = document.getElementById('chatbox');
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');

    let isOpen = false;

    openChatBtn.addEventListener('click', () => {
        isOpen = !isOpen;
        chatbox.classList.toggle('hidden', !isOpen);
        if (isOpen) {
            messageInput.focus();
        }
    });
    sendBtn.addEventListener('click', () => {
    const message = messageInput.value.trim();
    if (message !== '') {
        const messageElement = document.createElement('div');
        messageElement.textContent = `Vous : ${message}`;
        messagesDiv.appendChild(messageElement);
        messageInput.value = '';
        messageInput.focus();

        // Envoi du message au serveur via AJAX
        fetch('/sendmessage', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                projet_id: {{ $projet->id }}, // Remplacez par la valeur réelle
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            // Traitez la réponse si nécessaire
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors de l\'envoi du message : ', error);
        });
    }
});



</script>
@endsection

