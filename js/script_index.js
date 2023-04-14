
function enlargeImage(img) {
    //     get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("expandedImg");
    var captionText = document.getElementById("imgText");
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
    modalImg.style.display = "block";
    captionText.style.display = "block";

}

function refresh_screens() {
    location.reload();
}

