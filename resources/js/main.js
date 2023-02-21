const runButton = document.getElementById('run');
var audio = ''
runButton.addEventListener('click', function () {
    if (runButton.classList.contains('fa-play')) {
        runButton.classList.remove('fa-play');
        runButton.classList.add('fa-pause');
        audio.play()
    } else {
        runButton.classList.remove('fa-pause');
        runButton.classList.add('fa-play');
        audio.pause()
    }
});
const playButton = document.querySelectorAll('.playbtn');
for (var i = 0; i < playButton.length; i++) {
    playButton[i].addEventListener('click', function (e) {
        if (runButton.classList.contains('fa-play')) {
            runButton.classList.remove('fa-play');
            runButton.classList.add('fa-pause');
            audio = new Audio(e.target.parentElement.attributes[1].value)
            audio.play()
        } else {
            runButton.classList.remove('fa-pause');
            runButton.classList.add('fa-play');
            audio.pause()
        }
    }
    )
};