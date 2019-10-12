let vid;
let playButton;
let pausePlay;
let fullscreen;
let videoControls;
let playButtonOverlay;
let progressBar;
let progressBarFiller;
let menuToggle;
let navigationListItems;



document.addEventListener('DOMContentLoaded', loaded);


//event listeners

function loaded()
{
    referenceDOMS();
    registerEvents();
}


function referenceDOMS()
{
    vid                 = document.getElementById("vid");
    playButton          = document.getElementById("play");
    pausePlay           = document.getElementById("pause-play");
    fullscreen          = document.getElementById("fullscreen");
    videoControls       = document.getElementsByClassName("video-controls")[0];
    playButtonOverlay   = document.getElementsByClassName("play-button")[0];
    progressBar         = document.getElementById('progress-bar');
    progressBarFiller   = document.getElementById('progress-bar-filler');
    menuToggle          = document.getElementById('menu-toggle');
    navigationListItems = document.getElementsByClassName("navigation-list-item");
}

function registerEvents()
{
    if(window.innerWidth < 769) {
        for (i = 0; i < navigationListItems.length; i++) {
            navigationListItems[i].style.display='none';
        }
    }
    playButton && playButton.addEventListener("click",playVideo);
    fullscreen && fullscreen.addEventListener("click",openFullscreen);
    pausePlay && pausePlay.addEventListener("click",pauseVideo);
    menuToggle && menuToggle.addEventListener("click", toggleMenu);
    vid && vid.addEventListener('timeupdate', updateProgressBar, false);
}

function playVideo()
{
    vid.play();
    playButtonOverlay.style.opacity = 0;
    videoControls.style.display = 'flex';
    videoControls.style.opacity     = 1;
    setTimeout(()=>{
        playButtonOverlay.style.display = 'none';
    },800)

}

function pauseVideo()
{
    vid.pause();
    videoControls.style.opacity     = 0;
    playButtonOverlay.style.display = 'flex';
    playButtonOverlay.style.opacity = 1;
    setTimeout(()=>{
        videoControls.style.display = 'none';
    },800)
}

function updateProgressBar() {
    progressBar = document.getElementById('progress-bar');
    var percentage = Math.floor((100 / vid.duration) *
    vid.currentTime);
    progressBarFiller.style.width = percentage + '%';

 }

 function openFullscreen() {
    if (vid.requestFullscreen) {
        vid.requestFullscreen();
    } else if (vid.mozRequestFullScreen) { /* Firefox */
        vid.mozRequestFullScreen();
    } else if (vid.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
        vid.webkitRequestFullscreen();
    } else if (vid.msRequestFullscreen) { /* IE/Edge */
        vid.msRequestFullscreen();
    }
  }

function toggleMenu() {
    for (i = 0; i < navigationListItems.length; i++) {
        console.log('navigationListItems[i].style.display: ', navigationListItems[i].style.display);
        if (navigationListItems[i].style.display === "none") {
            navigationListItems[i].style.display = "inline-block";
            document.getElementsByClassName('navigation-list')[0].style["flex-direction"] = "column";
        }
        else {
            navigationListItems[i].style.display = "none";
            document.getElementsByClassName('navigation-list')[0].style["flex-direction"] = "row";
        }
        document.getElementsByClassName('menu-toggle')[0].style.display = "block";
    }
}
