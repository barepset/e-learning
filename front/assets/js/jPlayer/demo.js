$(document).ready(function(){

  var myPlaylist = new jPlayerPlaylist({
    jPlayer: "#jplayer_N",
    cssSelectorAncestor: "#jp_container_N"
  }, [
    {
      title:"Bubble",
      artist:"Miaow",
      mp3: "http://flatfull.com/themes/assets/musics/Miaow-07-Bubble.mp3",
      oga: "http://flatfull.com/themes/assets/musics/Miaow-07-Bubble.ogg",
      poster: "images/m0.jpg"
    },
    {
      title:"Lentement",
      artist:"Miaow",
      mp3: "http://flatfull.com/themes/assets/musics/Miaow-03-Lentement.mp3",
      oga: "http://flatfull.com/themes/assets/musics/Miaow-03-Lentement.ogg",
      poster: "images/m0.jpg"
    },
    {
      title:"Partir",
      artist:"Miaow",
      mp3: "http://flatfull.com/themes/assets/musics/Miaow-09-Partir.mp3",
      oga: "http://flatfull.com/themes/assets/musics/Miaow-09-Partir.ogg",
      poster: "images/m0.jpg"
    }
  ], {
    playlistOptions: {
      enableRemoveControls: true,
      autoPlay: true
    },
    swfPath: "js/jPlayer",
    supplied: "webmv, ogv, m4v, oga, mp3",
    smoothPlayBar: true,
    keyEnabled: true,
    audioFullScreen: false
  });
  
  $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer,  function(){
    $('.musicbar').removeClass('animate');
    $('.jp-play-me').removeClass('active');
    $('.jp-play-me').parent('li').removeClass('active');
  });

  $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer,  function(){
    $('.musicbar').addClass('animate');
  });

  $(document).on('click', '.jp-play-me', function(e){
    e && e.preventDefault();
    var $this = $(e.target);
    if (!$this.is('a')) $this = $this.closest('a');

    $('.jp-play-me').not($this).removeClass('active');
    $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');

    $this.toggleClass('active');
    $this.parent('li').toggleClass('active');
    if( !$this.hasClass('active') ){
      myPlaylist.pause();
    }else{
      var i = Math.floor(Math.random() * (1 + 7 - 1));
      myPlaylist.play(i);
    }
    
  });



  // video

  $("#jplayer_1").jPlayer({
    ready: function () {
      $(this).jPlayer("setMedia", {
        title: "Big Buck Bunny",
        m4v: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.m4v",
        ogv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.ogv",
        webmv: "http://flatfull.com/themes/assets/video/big_buck_bunny_trailer.webm",
        poster: "images/m41.jpg"
      });
    },
    swfPath: "js",
    supplied: "webmv, ogv, m4v",
    size: {
      width: "100%",
      height: "auto",
      cssClass: "jp-video-360p"
    },
    globalVolume: true,
    smoothPlayBar: true,
    keyEnabled: true
  });

});


///////////////////

   var getaudio = $('#player')[0];
   /* Get the audio from the player (using the player's ID), the [0] is necessary */
   var mouseovertimer;
   /* Global variable for a timer. When the mouse is hovered over the speaker it will start playing after hovering for 1 second, if less than 1 second it won't play (incase you accidentally hover over the speaker) */
   var audiostatus = 'off';
   /* Global variable for the audio's status (off or on). It's a bit crude but it works for determining the status. */

   $(document).on('mouseenter', '.speaker', function() {
     /* Bonus feature, if the mouse hovers over the speaker image for more than 1 second the audio will start playing */
     if (!mouseovertimer) {
       mouseovertimer = window.setTimeout(function() {
         mouseovertimer = null;
         if (!$('.speaker').hasClass("speakerplay")) {
           getaudio.load();
           /* Loads the audio */
           getaudio.play();
           /* Play the audio (starting at the beginning of the track) */
           $('.speaker').addClass('speakerplay');
           return false;
         }
       }, 1000);
     }
   });

   $(document).on('mouseleave', '.speaker', function() {
     /* If the mouse stops hovering on the image (leaves the image) clear the timer, reset back to 0 */
     if (mouseovertimer) {
       window.clearTimeout(mouseovertimer);
       mouseovertimer = null;
     }
   });

   $(document).on('click touchend', '.speaker', function() {
     /* Touchend is necessary for mobile devices, click alone won't work */
     if (!$('.speaker').hasClass("speakerplay")) {
       if (audiostatus == 'off') {
         $('.speaker').addClass('speakerplay');
         getaudio.load();
         getaudio.play();
         window.clearTimeout(mouseovertimer);
         audiostatus = 'on';
         return false;
       } else if (audiostatus == 'on') {
         $('.speaker').addClass('speakerplay');
         getaudio.play()
       }
     } else if ($('.speaker').hasClass("speakerplay")) {
       getaudio.pause();
       $('.speaker').removeClass('speakerplay');
       window.clearTimeout(mouseovertimer);
       audiostatus = 'on';
     }
   });

   $('#player').on('ended', function() {
     $('.speaker').removeClass('speakerplay');
     /*When the audio has finished playing, remove the class speakerplay*/
     audiostatus = 'off';
     /*Set the status back to off*/
   });