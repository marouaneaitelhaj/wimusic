const runButton = document.getElementById('run');
runButton.addEventListener('click', function () {
    if (runButton.classList.contains('fa-play')) {
        runButton.classList.remove('fa-play');
        runButton.classList.add('fa-pause');
        document.querySelector("#music").play()
    } else {
        runButton.classList.remove('fa-pause');
        runButton.classList.add('fa-play');
        document.querySelector("#music").pause()
    }
});
function playmusic(){
    console.log("text")
}