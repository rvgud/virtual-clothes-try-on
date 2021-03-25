try {
    var j = jQuery.noConflict();
    var front_uploaded_flag = false;
    var side_uploaded_flag = false;
    var global_view = "Front";
    var video_streaming = false;
    var webcamStream;
    var tryOnImgUrl = '';
    var tryOnSideImgUrl = '';
    var productid = '';
    j(function() {
        j("#tryonimagediv").draggable({ containment: "parent" ,
        stop: function( event, ui ) {
            j("#tooltiptextdrag").css("visibility", "hidden");
        }
    });
        //j("#TryOnModal-dialog").draggable();
        j("#tryonimagediv").resizable({
            aspectRatio: true,
            stop: function( event, ui ) {
                j("#tooltiptextdrag").css("visibility", "hidden");
            }
        });

    });

    rotate = 0;
    rotate360 = 0;
    rotateimageCanvas = 0;
    
    function rotate_right() {
        rotate = rotate + 1;
        document.getElementById("tryonimagediv").style.webkitTransform = "rotate(" + rotate + "deg)";

    }

    function rotate_left() {
        rotate = rotate - 1;
        document.getElementById("tryonimagediv").style.webkitTransform = "rotate(" + rotate + "deg)";

    }
    function rotate_360() {
        rotate360 = rotate360 + 5;
        document.getElementById("tryonimagediv").style.webkitTransform = "rotateY(" + rotate360 + "deg)";

    }

    function rotate_image_canvas() {
        rotateimageCanvas = rotateimageCanvas + 90;
        console.log(rotateimageCanvas);
        document.getElementById("imageCanvas").style.webkitTransform = "rotate(" + rotateimageCanvas + "deg)";

    }

    function zoom_out() {
        var width = j("#tryonimagediv").width();
        j("#tryonimagediv").width(width - (width * 0.05));

    }

    function zoom_in() {
        var width = j("#tryonimagediv").width();
        j("#tryonimagediv").width(width + (width * 0.05));

    }
} catch (err) {
    console.log(err.message);
}