<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
  <title>Gsap Animation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="gsapcss.css" />
</head>

<body>
  <div>
    <img src="images/arrow.png" alt="image" class="circle">



    <script>
      TweenMax.to('.circle', 3, {
        left: '95%',
        rotation: 180,
        ease: Bounce.easeOut,
        repeat: -1,
        yoyo: true
      });
    </script>
  </div>

  <svg id="svg" viewBox="0 0 1000 1000">
    <path id="path1"></path>
    <path id="path2"></path>
   
  </svg>

  
  <!-- partial -->
    <script src='https://unpkg.co/gsap@3/dist/gsap.min.js'></script>
    <script src="js/Animscript.js"></script>




</body>

</html>