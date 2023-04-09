function setDuration(audioId, durationSpanId) {
    var audio = document.getElementById(audioId);
    var durationSpan = document.getElementById(durationSpanId);

    audio.addEventListener('loadedmetadata', function() {
        var duration = audio.duration;
        var minutes = Math.floor(duration / 60);
        var seconds = Math.floor(duration % 60);
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        durationSpan.innerHTML = minutes + ':' + seconds;
    });
}

function playShow(audio) {
    var podcastAudio = document.getElementById(audio);
    
    var playBtn = document.getElementById("podcast-play." + audio);
    var pauseBtn = document.getElementById("podcast-pause." + audio);
    
    podcastAudio.play();
    playBtn.style.display = 'none';
    pauseBtn.style.display = 'inline-block';
};

function pauseShow(audio) {
    var podcastAudio = document.getElementById(audio);

    var playBtn = document.getElementById("podcast-play." + audio);
    
    var pauseBtn = document.getElementById("podcast-pause." + audio)

    podcastAudio.pause();
    playBtn.style.display = 'inline-block';
    pauseBtn.style.display = 'none';
};

function favoritarMusica(idUser, idMusica, nomeMusica) {
    dados = {
        user: idUser,
        musica: idMusica
    }

    $.get("favoritar.php", dados);
    var favBtn = document.getElementById("ico.fav" + nomeMusica);

    var desfavBtn = document.getElementById("ico.desfav" + nomeMusica);

    favBtn.style.display = 'none';
    desfavBtn.style.display = 'inline-block';
};

function desfavoritarMusica(idUser, idMusica, nomeMusica) {
    dados = {
        user: idUser,
        musica: idMusica
    }

    $.get("desfavoritar.php", dados);
    var favBtn = document.getElementById("ico.fav" + nomeMusica);

    var desfavBtn = document.getElementById("ico.desfav" + nomeMusica)

    favBtn.style.display = 'inline-block';
    desfavBtn.style.display = 'none';
};
