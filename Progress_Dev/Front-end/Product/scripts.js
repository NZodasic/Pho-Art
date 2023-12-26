document.addEventListener('DOMContentLoaded', function () {
    var imgMain = document.getElementById("img-main");
    var smallImg = document.getElementsByClassName("small-img");
        
    for (var i = 0; i < smallImg.length; i++) {
        smallImg[i].addEventListener('click', function() {
            imgMain.src = this.src;
        });
    }
});

