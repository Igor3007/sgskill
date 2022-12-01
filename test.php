<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



</head>

<body>

    <div id="player" class></div>





    <script src="https://player.kinescope.io/latest/iframe.player.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function(event) {

            const elem = document.querySelector('#player')

            Kinescope.IframePlayer.create(elem.id, {
                    url: 'https://kinescope.io/201623282',
                    size: {
                        width: '50%',
                        height: 400
                    },
                })
                .then(function(player) {
                    player
                        .once(player.Events.Ready, function(event) {
                            event.target.setVolume(0.5);
                        })
                        .on(player.Events.Playing, function(event) {
                            setTimeout(function() {
                                event.target.pause();
                            }, 5000);
                        });
                });

        });
    </script>


</body>

</html>