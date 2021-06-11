
let inputUploadAvatar= null;
let imageBase64Source = null;
let cropperUpload = null;
let getImage = () => {
    console.log("object")
    function readFile(input) {  
        inputUploadAvatar = input;
        let cropper = null;
        let widthCanvas =  $('#doi_anh_dai_dien').find('.modal-body .crop-thumbnail').width();
        if($('#doi_anh_dai_dien').hasClass('show')){
            $('.crop-thumbnail').html("");     
            if (inputUploadAvatar.files && inputUploadAvatar.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    imageBase64Source = e.target.result;
                    cropper = new Cropper({
                        onInit: function (crop) {
                            
                            console.info("Cropper is ready");
                        },
                        onChange: function (crop) {
                            
            
                        }
                    });
                    cropper.render(".crop-thumbnail");
                    cropper.setWidth(widthCanvas);
                    cropper.loadImage(imageBase64Source).then(function (crop) {
                        console.info("Image is ready to crop.");
                       
                    });
                    cropperUpload = cropper;
                    
                };
                reader.readAsDataURL(inputUploadAvatar.files[0]);
     
                return cropperUpload;
                
            } else {
                console.log("Sorry - you're browser doesn't support the FileReader API");
            }
        }else{
            $('.crop-thumbnail').html("");   
            $('#doi_anh_dai_dien').modal('show');
        }
        // $('#doi_anh_dai_dien').modal('show');

    }
    $('#doi_anh_dai_dien').on('hidden.bs.modal',function(){
        $('.crop-thumbnail').html("");      
    })
    $(document).on("change",".file-upload", function () {
        console.log("oke")
        readFile(this);
    });
};
$(document).on('click','#doi_anh_dai_dien .save',function(){
    $('.img-thumbnail').attr('src',cropperUpload.getCroppedImage())
    $('#doi_anh_dai_dien').modal('hide');
    // console.log(cropperUpload)
});

$(document).on('wheel','.crop-thumbnail',function(event){
    // console.log("object")

    if(event.originalEvent.deltaY < 0){
        // wheeled up
        // console.log("up")
        
        let rangeVal = $( ".cropper-zoom").find('input[type="range"]').val();

        let finalRange = (rangeVal/100)+0.1 <= 1 ? (rangeVal/100)+0.1 : 1;
        // console.log((rangeVal/100)+0.1)
    
        cropperUpload.setZoom(finalRange);
      }
      else {
        // wheeled down
        // console.log('down')
        let rangeVal = $( ".cropper-zoom").find('input[type="range"]').val();

        let finalRange = (rangeVal/100)-0.1 >= 0 ? (rangeVal/100)-0.1 : 0;
      
        cropperUpload.setZoom(finalRange);
      }
});


function rotate(srcBase64, degrees, callback) {
    const canvas = document.createElement("canvas");
    let ctx = canvas.getContext("2d");
    let image = new Image();
    image.src = srcBase64;
    image.onload = function () {
        canvas.width = degrees % 180 === 0 ? image.width : image.height;
        canvas.height = degrees % 180 === 0 ? image.height : image.width;

        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate((degrees * Math.PI) / 180);
        ctx.drawImage(image, image.width / -2, image.height / -2);
        callback(canvas.toDataURL());
    };

    
}

$(document).on('click','.rotate-upload-right',function(){
    
      let __this = $(this);
      let value = __this.data('rotate');
      value+=90;

      __this.data('rotate',value);
      
      rotate(imageBase64Source, value, function(resultBase64) {
    
        cropperUpload.loadImage(resultBase64).then(function (crop) {
            console.info("Image is ready to crop.");
           
        });
        // imageTag.setAttribute('src', resultBase64);
      });
});

// $(document).on('click','.rotate-upload-left',function(){
    
//     let __this = $(this);
//     let value =__this.data('rotate');
//     value-=90

//     __this.data('rotate', Math.sqrt(value));
    
//     rotate(imageBase64Source, value, function(resultBase64) {
  
//       cropperUpload.loadImage(resultBase64).then(function (crop) {
//           console.info("Image is ready to crop.");
         
//       });
//       // imageTag.setAttribute('src', resultBase64);
//     });
// });
let getCropper = (cropper,input)=>{
    // console.log('c')
    
}
$(document).on('shown.bs.modal','#doi_anh_dai_dien',function(){
    // let 
        let cropper = null;
        let widthCanvas =  $(this).find('.modal-body .crop-thumbnail').width();

        if (inputUploadAvatar.files && inputUploadAvatar.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imageBase64Source = e.target.result;
                cropper = new Cropper({
                    onInit: function (crop) {
                        
                        console.info("Cropper is ready");
                    },
                    onChange: function (crop) {
                        
        
                    }
                });
                cropper.render(".crop-thumbnail");
                cropper.setWidth(widthCanvas);
                cropper.loadImage(imageBase64Source).then(function (crop) {
                    console.info("Image is ready to crop.");
                   
                });
                cropperUpload = cropper;
                
            };
            reader.readAsDataURL(inputUploadAvatar.files[0]);
 
            return cropperUpload;
            
        } else {
            console.log("Sorry - you're browser doesn't support the FileReader API");
        }
        // getCropper(cropper,inputUploadAvatar);
        
})
