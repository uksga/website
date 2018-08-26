var fileUpload; 
if (document.getElementById('team_member_profile_image')) {
    console.log("FIRST");
    fileUpload = document.getElementById('team_member_profile_image');
}
if (document.getElementById('team_hero_image')) {
    console.log("SECOND");
    fileUpload = document.getElementById('team_hero_image');
}

var output = document.getElementById('image-preview');
var button = document.getElementById('image-upload-button');
output.style.display = "none";
fileUpload.addEventListener('change', openFile);
function openFile(file) {
    var input = file.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        output.style.display = "flex";
        output.src = dataURL;
        button.classList.add("btn--blue-solid");
        button.classList.add("btn--approved");
        button.innerHTML = 'Image Attached';
    };
    reader.readAsDataURL(input.files[0]);
};