//for dropdown
let profile = document.querySelector('.profile');
let menu = document.querySelector('.menu');

profile.onclick = function () {
    menu.classList.toggle('active');
}
//forpost
function countCharacters(event){
    var postBodyLength = document.getElementById('postBody').value.length;
    var charactersLeft = 500 - postBodyLength;
    if(event.keyCode === 8 && (postBodyLength >= 0 && postBodyLength <= 500)){
         charactersLeft+=1;
      } 
      else if(event.keyCode != 8 && (postBodyLength >= 0 && postBodyLength <= 500)) {
        charactersLeft -=1;
      }
          document.getElementById('charactersLeft').innerHTML = charactersLeft + 1;
  }
  //for react
  $(function() {
    $(".heart").on("click", function() {
      $(this).toggleClass("is-active");
    });
  });

  
  //for gallery


  function showImage(imageUrl) {
    var popup = document.createElement('div');
    popup.classList.add('image-popup');
    
    var img = document.createElement('img');
    img.src = imageUrl;
    
    var closeBtn = document.createElement('button');
    closeBtn.classList.add('image-popup-close');
    closeBtn.innerHTML = 'Close';
    closeBtn.addEventListener('click', function() {
        document.body.removeChild(popup);
    });
    
    popup.appendChild(img);
    popup.appendChild(closeBtn);
    
    document.body.appendChild(popup);
}
