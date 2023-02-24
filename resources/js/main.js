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
document.getElementById('form1').addEventListener('input', function () {
    $.ajax({
        url: "http://127.0.0.1:8000/discover/" + document.getElementById("form1").value,
        beforeSend: function () {
            document.querySelector('main').innerHTML = '<div class="mainone d-flex justify-content-center flex-wrap"><div class="spinner-border text-warning" role="status"> <span class="sr-only">Loading...</span> </div></div>'
        },
        success: function (data) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = data;
            document.querySelector('main').innerHTML = wrapper.querySelector('main').innerHTML
        },
    });
})